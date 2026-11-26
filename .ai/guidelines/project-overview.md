# SIMKES — Project Discovery Summary

> Dokumen ini merangkum hasil diskusi awal mengenai kebutuhan, ruang lingkup, dan arah pengembangan SIMKES (Sistem Informasi Manajemen Kesehatan). Dokumen akan diperbarui secara bertahap seiring proses discovery dan pengembangan.

## 1. Project Background

### 1.1 Project Purpose

SIMKES merupakan proyek pengembangan sistem informasi manajemen klinik yang memiliki dua tujuan utama:

1. **Learning Project** — menjadi sarana untuk mempelajari pengembangan sistem yang memiliki domain bisnis cukup kompleks, khususnya sistem informasi kesehatan.
2. **Personal Product** — membangun produk yang berpotensi digunakan oleh klinik sungguhan di masa mendatang.

Pengembangan dilakukan secara bertahap. Fokus awal bukan membangun seluruh fitur sekaligus, melainkan memahami domain klinik, merancang fondasi sistem, kemudian mengembangkan fitur berdasarkan kebutuhan yang telah dipahami.

### 1.2 Main Reference

Referensi utama yang digunakan adalah **SIMKES Khanza**.

Sumber pembelajaran yang telah diketahui:

- Website dan katalog fitur SIMKES Khanza.
- Repository GitHub: [https://github.com/mas-elkhanza/SIMRS-Khanza](https://github.com/mas-elkhanza/SIMRS-Khanza)
- Dokumentasi dan tutorial penggunaan Khanza yang tersedia secara publik.

Khanza digunakan sebagai referensi untuk mempelajari cakupan fitur, proses bisnis, dan kemungkinan implementasi sistem.

**Catatan:** Belum ada observasi langsung terhadap aplikasi Khanza yang sedang berjalan. Pemahaman awal mengenai alur klinik masih berasal dari pengalaman sebagai pasien, katalog fitur, dokumentasi, dan tutorial. Karena itu, alur yang telah dibahas sejauh ini merupakan hipotesis kebutuhan sistem kita, bukan representasi pasti dari alur Khanza.

---

## 2. Initial Product Scope

### 2.1 Target Facility

Sistem pada tahap awal ditujukan untuk klinik dengan karakteristik:

- Satu klinik.
- Satu lokasi fisik.
- Memiliki beberapa unit pelayanan atau poli.
- Sudah bekerja sama dengan BPJS Kesehatan.
- Memiliki pelayanan rawat jalan.

Sistem diharapkan memiliki fondasi yang memungkinkan pengembangan lebih lanjut untuk kebutuhan fasilitas kesehatan yang lebih kompleks.

### 2.2 Initial Service Units

Dua poli yang menjadi fokus awal:

- Poli Umum.
- Poli Gigi.

Kedua poli memiliki alur pelayanan umum yang serupa, tetapi dapat memiliki kebutuhan pemeriksaan dan formulir rekam medis yang berbeda.

Contohnya, Poli Gigi dapat membutuhkan odontogram untuk mencatat kondisi gigi pasien.

### 2.3 Service Scope

| Area             | Ruang lingkup awal |
| ---------------- | ------------------ |
| Rawat jalan      | Termasuk           |
| Rawat inap       | Termasuk           |
| Pendaftaran      | Walk-in            |
| Appointment      | Belum termasuk     |
| Poli Umum        | Termasuk           |
| Poli Gigi        | Termasuk           |
| Farmasi internal | Termasuk           |
| Laboratorium     | Belum ditentukan   |
| Radiologi        | Belum ditentukan   |

---

## 3. Identified Actors

Berikut aktor operasional yang telah diidentifikasi:

1. Petugas pendaftaran
2. Perawat
3. Dokter
4. Petugas farmasi
5. Kasir
6. Admin klinik

Aktor tersebut merupakan pembagian tanggung jawab operasional, bukan keputusan final mengenai role dan permission di dalam aplikasi.

Satu pegawai mungkin dapat menjalankan lebih dari satu tanggung jawab. Karena itu, desain akun pengguna, pegawai, jabatan, role, dan permission perlu dibahas secara terpisah.

---

## 4. Initial Business Process Understanding

Bagian ini berisi gambaran awal proses pelayanan berdasarkan diskusi discovery. Detailnya masih perlu divalidasi melalui dokumentasi dan referensi proses klinik.

### 4.1 Patient Registration

- Pasien dapat datang langsung ke klinik tanpa membuat appointment.
- Sistem perlu membedakan pasien baru dan pasien lama.
- Pasien baru perlu dibuatkan data identitas dan nomor rekam medis.
- Pasien lama menggunakan identitas atau nomor rekam medis yang sudah tersedia.
- Pendaftaran perlu mencatat jenis pembayaran atau penjamin.
- Pasien didaftarkan ke poli yang dituju.

### 4.2 Queue Management

- Setiap poli memiliki antrean masing-masing.
- Antrean tidak dipisahkan berdasarkan dokter.
- Satu poli dapat memiliki beberapa dokter.
- Dokter dapat memiliki jadwal atau shift yang berbeda.
- Pasien dapat diarahkan kepada dokter yang sedang bertugas.

### 4.3 Nursing Assessment

- Perawat melakukan penggalian keluhan awal pasien sebelum pasien masuk ke ruang pemeriksaan.
- Pemeriksaan tanda vital, seperti tekanan darah, dilakukan ketika pasien memasuki proses pemeriksaan.
- Detail pemeriksaan awal dan pembagian tanggung jawab antara perawat dan dokter masih perlu diperdalam.

### 4.4 Doctor Examination

- Dokter melakukan pemeriksaan dan mencatat hasil pelayanan.
- Setiap kunjungan memiliki catatan medis masing-masing.
- Poli yang berbeda dapat memiliki formulir pemeriksaan yang berbeda.
- Seluruh riwayat kunjungan pasien tetap terhubung dalam satu rekam medis pasien.

### 4.5 Pharmacy

Klinik diasumsikan memiliki farmasi internal.

Kebutuhan awal:

- Dokter membuat resep.
- Petugas farmasi menerima dan memproses resep.
- Petugas farmasi menyiapkan dan menyerahkan obat.
- Transaksi obat memengaruhi stok persediaan.

Pengelolaan persediaan awal mencakup:

- Master obat.
- Stok obat.
- Batch obat.
- Tanggal kedaluwarsa.
- Supplier.
- Penerimaan barang.
- Penyesuaian stok.
- Riwayat pergerakan stok.

Penerimaan stok pada tahap awal dicatat ketika barang benar-benar diterima. Proses pengadaan seperti purchase order belum menjadi prioritas.

Riwayat transaksi stok harus dapat ditelusuri. Kesalahan transaksi sebaiknya dikoreksi melalui transaksi penyesuaian atau pembatalan yang tercatat, bukan dengan menghapus riwayat transaksi secara sembarangan.

### 4.6 Billing and Payment

- Satu kunjungan menghasilkan satu tagihan gabungan.
- Tagihan dapat mencakup konsultasi, tindakan, obat, dan komponen biaya lainnya.
- Metode pembayaran pasien umum mencakup tunai, transfer bank, dan QRIS.
- Pembayaran dilakukan di luar aplikasi.
- Kasir atau petugas yang berwenang mengonfirmasi pembayaran secara manual.
- Sistem mencatat metode, jumlah, status, waktu, dan petugas yang mengonfirmasi pembayaran.

Status pembayaran yang perlu dipertimbangkan:

- Unpaid.
- Awaiting confirmation.
- Partial.
- Paid.
- Cancelled.

Pembayaran pasien BPJS perlu dibedakan dari pembayaran pasien umum. Mekanisme penjaminan dan klaim BPJS tidak boleh diasumsikan sama dengan transaksi pembayaran pasien umum.

---

## 5. Medical Record Concept

Rekam medis menggunakan pendekatan terpusat berdasarkan pasien.

Artinya:

- Satu pasien memiliki satu identitas rekam medis.
- Pasien dapat memiliki banyak kunjungan.
- Setiap kunjungan memiliki catatan klinisnya sendiri.
- Kunjungan dapat terjadi di poli yang berbeda.
- Riwayat pasien tetap dapat ditelusuri secara menyeluruh sesuai hak akses pengguna.

Detail struktur rekam medis, formulir klinis, dan batasan akses masih perlu didiskusikan.

---

## 6. Payer and BPJS

Klinik diasumsikan telah bekerja sama dengan BPJS Kesehatan.

Untuk tahap awal:

- Sistem mendukung pencatatan pasien BPJS.
- Sistem mendukung pencatatan informasi administrasi dan pelayanan pasien BPJS.
- Integrasi langsung dengan API BPJS belum menjadi kebutuhan implementasi awal.

Untuk pengembangan selanjutnya, integrasi dapat mencakup:

- Verifikasi kepesertaan.
- Pengecekan eligibilitas.
- Bridging layanan BPJS.
- Pengelolaan data klaim.

Integrasi BPJS perlu dipelajari secara khusus karena melibatkan aturan, alur administrasi, dan persyaratan teknis dari pihak eksternal.

---

## 7. Initial Product Decisions

| Area             | Keputusan awal                        |
| ---------------- | ------------------------------------- |
| Tujuan proyek    | Learning project dan personal product |
| Referensi utama  | SIMKES Khanza                         |
| Target fasilitas | Klinik                                |
| Lokasi           | Satu lokasi fisik                     |
| Poli awal        | Poli Umum dan Poli Gigi               |
| Pelayanan        | Rawat jalan                           |
| Pendaftaran      | Walk-in                               |
| Dokter           | Beberapa dokter per poli              |
| Jadwal dokter    | Mendukung shift                       |
| Antrean          | Satu antrean per poli                 |
| Perawat          | Melakukan penggalian keluhan awal     |
| Rekam medis      | Terpusat per pasien                   |
| Form pemeriksaan | Dapat berbeda berdasarkan poli        |
| Penjamin         | Umum dan BPJS                         |
| Integrasi BPJS   | Belum pada tahap awal                 |
| Farmasi          | Internal                              |
| Pengadaan obat   | Penerimaan barang terlebih dahulu     |
| Tagihan          | Satu tagihan gabungan per kunjungan   |
| Pembayaran       | Konfirmasi manual                     |
| Payment gateway  | Belum dibutuhkan                      |

---

## 8. Deferred Topics and Open Questions

Topik berikut belum diputuskan atau belum dibahas secara mendalam:

### Operational Workflow

- Pembatalan pendaftaran dan kunjungan.
- Pembatalan atau perubahan antrean.
- Pasien yang tidak hadir atau meninggalkan antrean.
- Alur rujukan antar-poli.
- Alur pasien darurat.
- Detail proses perawat dan dokter.

### Clinical Domain

- Struktur lengkap rekam medis.
- Diagnosis dan klasifikasi penyakit.
- Tindakan medis.
- Form pemeriksaan khusus tiap poli.
- Dokumentasi odontogram.
- Tanda tangan dan validasi catatan medis.

### Pharmacy and Inventory

- Detail proses pengeluaran obat.
- Penanganan retur obat.
- Penanganan obat kedaluwarsa.
- Kebijakan stok minimum.
- Detail pencatatan batch dan satuan obat.

### Finance and Reporting

- Detail tarif layanan.
- Diskon dan penyesuaian tagihan.
- Pembayaran BPJS.
- Laporan keuangan.
- Laporan operasional klinik.

### Security and Compliance

- Hak akses rekam medis.
- Audit log.
- Backup dan pemulihan data.
- Perlindungan data pribadi dan data kesehatan.
- Ketentuan regulasi yang berlaku.

### External Integration

- BPJS Kesehatan.
- SATU SEHAT.
- Integrasi eksternal lainnya.

Topik-topik ini tidak ditolak atau dihilangkan dari rencana. Topik tersebut hanya ditunda sampai proses discovery mencapai tahap yang relevan.

---

## 9. Next Development Direction: Master Data First

Sebelum membangun fitur pelayanan pasien, pengembangan akan dimulai dengan mempersiapkan master data.

Tujuannya adalah membangun fondasi data yang akan digunakan oleh berbagai modul sistem.

Area master data yang berpotensi dibutuhkan:

1. **Clinic Profile** — identitas dan informasi klinik.
2. **Polyclinic** — unit pelayanan seperti Poli Umum dan Poli Gigi.
3. **Employees and Medical Personnel** — data pegawai, dokter, perawat, dan petugas lainnya.
4. **Users and Access Control** — akun pengguna, role, dan permission.
5. **Doctor Schedules** — jadwal praktik dan shift dokter.
6. **Patient References** — kategori pasien, penjamin, dan referensi administrasi.
7. **Referral Sources** — sumber kedatangan atau rujukan pasien.
8. **Services and Procedures** — daftar layanan dan tindakan beserta tarif.
9. **Medicine Catalog** — data obat, satuan, kategori, dan informasi pendukung.
10. **Suppliers** — data pemasok obat dan barang medis.
11. **Payment Methods** — metode pembayaran yang didukung.

Daftar tersebut merupakan kandidat awal, bukan daftar final. Setiap entitas perlu dianalisis berdasarkan fungsi, relasi, dan kebutuhan proses bisnisnya sebelum desain database ditentukan.

---

## 10. Working Principles for Future Discovery

Dalam proses diskusi dan pengembangan berikutnya:

- Jangan menganggap hipotesis sebagai fakta.
- Pisahkan keputusan yang sudah disepakati, asumsi, dan pertanyaan terbuka.
- Gunakan dokumentasi Khanza dan referensi proses klinik untuk memahami domain.
- Jangan langsung meniru implementasi Khanza tanpa memahami alasan di balik alurnya.
- Prioritaskan pemahaman proses bisnis sebelum menentukan desain database.
- Bangun sistem secara bertahap dan hindari overengineering.
- Pertimbangkan kebutuhan klinik di Indonesia, khususnya regulasi dan integrasi eksternal.
- Pertahankan fleksibilitas agar sistem dapat dikembangkan lebih jauh.

**Peran ChatGPT dalam proyek ini:** menjadi partner diskusi teknis, product analyst, konsultan domain sistem kesehatan, mentor Laravel, konsultan database, dan asisten riset teknis. Keputusan akhir dan implementasi tetap dilakukan oleh developer.

---

_Status dokumen: Initial Discovery Summary — November 2026._
