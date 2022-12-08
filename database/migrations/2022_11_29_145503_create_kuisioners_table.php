<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuisioners', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('kdptimsmh');
            $table->bigInteger('kdpstmsmh');
            $table->bigInteger('nimhsmsmh');
            $table->string('nmmhsmsmh');
            $table->string('telpomsmh');
            $table->string('emailmsmh');
            $table->integer('tahun_lulus');
            $table->bigInteger('nik');
            $table->bigInteger('npwp')->nullable();
            // section pertanyaan
            $table->integer('f8'); //Jelaskan status Anda saat ini? 
            $table->integer('f504')->nullable(); //Apakah Anda telah mendapatkan pekerjaan <= 6 bulan / termasuk bekerja sebelum lulus?
            $table->integer('f502')->default(0); //Dalam berapa bulan Anda mendapatkan pekerjaan? 
            $table->integer('f505')->nullable(); //Berapa rata-rata pendapatan Anda per bulan? (take home pay)?
            $table->integer('f506')->nullable();

            // Dimana lokasi tempat Anda bekerja?
            $table->string('f5a1')->nullable(); //Provinsi
            $table->string('f5a2')->nullable(); //Kota/Kabupaten

            $table->integer('f1101')->nullable(); //Apa jenis perusahaan/intansi/institusi tempat anda bekerja sekarang?
            $table->integer('f1102')->nullable(); //Apa jenis perusahaan/intansi/institusi tempat anda bekerja sekarang?
            $table->string('f5b')->nullable(); //Apa nama perusahaan/kantor tempat Anda bekerja?
            $table->integer('f5c')->nullable(); //Bila berwiraswasta, apa posisi/jabatan Anda saat ini? (Apabila 1 Menjawab [3] wiraswasta) 
            $table->integer('f5d')->nullable(); //Apa tingkat tempat kerja Anda? 

            // Pertanyaan studi lanjut
            $table->integer('f18a')->nullable(); //Sumber biaya
            $table->string('f18b')->nullable(); //Perguruan Tinggi
            $table->string('f18c')->nullable(); //Program Studi
            $table->date('f18d')->nullable(); //Tanggal Masuk

            $table->integer('f1201'); //Sebutkan sumberdana dalam pembiayaan kuliah? * (bukan ketika Studi Lanjut)
            $table->string('f1202')->nullable(); //jika menjawab Lainnya (f1201), tuliskan (7)
            $table->integer('f14'); //Seberapa erat hubungan bidang studi dengan pekerjaan Anda?
            $table->integer('f15'); //Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini? 

            //pada tingkat mana kompetensi di bawah ini anda : kuasai? Pada saat ini (A)
            //pada tingkat mana kompetensi di bawah ini diperlukan dalam pekerjaan? (B)
            $table->integer('f1761'); //A. etika
            $table->integer('f1762'); //B etika
            $table->integer('f1763'); //A. Keahlian berdasarkan bidang ilmu
            $table->integer('f1764'); //B. Keahlian berdasarkan bidang ilmu
            $table->integer('f1765'); //A. Bahasa Inggris 
            $table->integer('f1766'); //B. Bahasa Inggris 
            $table->integer('f1767'); //A. Penggunaan Teknologi Informasi 
            $table->integer('f1768'); //B. Penggunaan Teknologi Informasi 
            $table->integer('f1769'); //A. Komunikasi
            $table->integer('f1770'); //B. Komunikasi
            $table->integer('f1771'); //A. Kerja sama tim
            $table->integer('f1772'); //B. Kerja sama tim
            $table->integer('f1773'); //A. Pengembangan
            $table->integer('f1774'); //B. Pengembangan

            // Menurut anda seberapa besar penekanan pada metode pembelajaran dibawah ini dilaksanakan di program studi anda?
            $table->integer('f21'); // Perkuliahan
            $table->integer('f22'); // Demonstrasi
            $table->integer('f23'); // Partisipasi dalam proyek riset
            $table->integer('f24'); // Magang
            $table->integer('f25'); // Praktikum
            $table->integer('f26'); // Kerja Lapangan
            $table->integer('f27'); // Diskusi

            // Kapan anda mulai mencari pekerjaan? Mohon pekerjaan sambilan tidak dimasukkan
            $table->integer('f301'); //1. sebelum lulus, 2. sesudah lulus, 3. Saya tidak mencari kerja
            $table->integer('f302')->nullable(); // jika f301 sebelum lulus
            $table->integer('f303')->nullable(); // jika f301 sesudah lulus

            // Bagaimana anda mencari pekerjaan tersebut? Jawaban bisa lebih dari satu
            $table->integer('f401')->nullable(); //Melalui iklan di koran/majalah, brosur (1/0)
            $table->integer('f402')->nullable(); //Melamar ke perusahaan tanpa mengetahui lowongan yang ada (1/0)
            $table->integer('f403')->nullable(); //Pergikebursa/pamerankerja (1/0)
            $table->integer('f404')->nullable(); //Mencarilewatinternet/iklanonline/milis (1/0)
            $table->integer('f405')->nullable(); //Dihubungi oleh perusahaan (1/0)
            $table->integer('f406')->nullable(); //Menghubungi Kemenakertrans (1/0)
            $table->integer('f407')->nullable(); //Menghubungi agen tenaga kerja komersial/swasta (1/0)
            $table->integer('f408')->nullable(); //Memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas (1/0)
            $table->integer('f409')->nullable(); //Menghubungikantorkemahasiswaan/hubunganalumni (1/0)
            $table->integer('f410')->nullable(); //Membangunjejaring(network)sejakmasihkuliah (1/0)
            $table->integer('f411')->nullable(); //Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.) (1/0)
            $table->integer('f412')->nullable(); //Membangun bisnis sendiri (1/0)
            $table->integer('f414')->nullable(); //Bekerja di tempat yang sama dengan tempat kerja semasa kuliah (1/0)
            $table->integer('f415')->nullable(); //Lainnya (1/0)
            $table->string('f416')->nullable(); //tuliskan Lainnya

            $table->integer('f6'); //Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?
            $table->integer('f7'); //Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda? 
            $table->integer('f7a')->nullable(); //Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara?  
            $table->integer('f1001')->nullable(); //Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir? Pilihlah satu jawaban?  
            $table->integer('f1002')->nullable(); //jika f1001 Lainnya

            // Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan : pendidikan anda, mengapa anda mengambilnya? Jawaban bisa lebih dari satu
            $table->integer('f1601')->nullable(); //Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya
            $table->integer('f1602')->nullable(); //Saya belum mendapatkan pekerjaan yang lebih sesuai
            $table->integer('f1603')->nullable(); //Di pekerjaan ini saya memeroleh prospek karir yang baik
            $table->integer('f1604')->nullable(); //Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya.
            $table->integer('f1605')->nullable(); //Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya
            $table->integer('f1606')->nullable(); //Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini
            $table->integer('f1607')->nullable(); //Pekerjaan saya saat ini lebih aman/terjamin/secure
            $table->integer('f1608')->nullable(); //Pekerjaan saya saat ini lebih menarik 
            $table->integer('f1609')->nullable(); //Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll. 
            $table->integer('f1610')->nullable(); //Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya. 
            $table->integer('f1611')->nullable(); //Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya.
            $table->integer('f1612')->nullable(); //Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya
            $table->integer('f1613')->nullable(); //Lainnya
            $table->string('f1614')->nullable(); //jika f1613 dipilih, sebutkan Lainnya.

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kuisioners');
    }
};
