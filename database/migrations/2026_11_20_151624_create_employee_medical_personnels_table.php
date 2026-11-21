<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee_medical_personnels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id');
            $table->string('nip')->nullable();
            $table->string('nik')->nullable();
            $table->string('no_str')->nullable();
            $table->string('no_sip')->nullable();
            $table->string('kode_dpjp_bpjs')->nullable();
            $table->string('ihs_practitioner_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_medical_personnels');
    }
};
