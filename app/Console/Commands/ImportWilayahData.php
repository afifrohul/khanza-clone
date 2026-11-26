<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Throwable;

#[Signature('wilayah:import')]
#[Description('Import data wilayah Indonesia dari database/data/wilayah_import.sql')]
class ImportWilayahData extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $filePath = database_path('data/wilayah_import.sql');

        if (! is_file($filePath)) {
            $this->error("File SQL tidak ditemukan: {$filePath}");

            return self::FAILURE;
        }

        $driver = DB::connection()->getDriverName();

        if (! in_array($driver, ['mysql', 'sqlite'], true)) {
            $this->error("Driver database '{$driver}' belum didukung oleh file import ini.");

            return self::FAILURE;
        }

        $sql = file_get_contents($filePath);

        if ($sql === false) {
            $this->error('File SQL tidak dapat dibaca.');

            return self::FAILURE;
        }

        preg_match_all(
            '/INSERT INTO `(provinces|cities|districts|subdistricts)` .*?;/s',
            $sql,
            $matches,
            PREG_SET_ORDER,
        );

        $statements = array_column($matches, 0);
        $importedTables = array_unique(array_column($matches, 1));
        $requiredTables = ['provinces', 'cities', 'districts', 'subdistricts'];

        if ($statements === [] || array_diff($requiredTables, $importedTables) !== []) {
            $this->error('File SQL tidak berisi data lengkap untuk keempat tabel wilayah.');

            return self::FAILURE;
        }

        foreach ($requiredTables as $table) {
            if (! DB::table($table)->exists()) {
                continue;
            }

            $this->error("Tabel '{$table}' sudah berisi data. Import dibatalkan agar tidak menimpa atau menggandakan data.");

            return self::FAILURE;
        }

        try {
            DB::transaction(function () use ($statements): void {
                foreach ($statements as $statement) {
                    if (! DB::unprepared($statement)) {
                        throw new RuntimeException('Salah satu perintah SQL gagal dijalankan.');
                    }
                }
            });
        } catch (Throwable $exception) {
            $this->error("Import gagal dan transaksi dibatalkan: {$exception->getMessage()}");

            return self::FAILURE;
        }

        $this->info(sprintf(
            'Import wilayah berhasil: %d batch SQL ke tabel %s.',
            count($statements),
            implode(', ', $requiredTables),
        ));

        return self::SUCCESS;
    }
}
