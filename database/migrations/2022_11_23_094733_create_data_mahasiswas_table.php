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
        Schema::create('data_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kode_pt');
            $table->bigInteger('kode_prodi');
            $table->bigInteger('npm');
            $table->string('nama_mahasiswa');
            $table->string('no_hp');
            $table->string('email');
            $table->integer('tahun_lulus');
            $table->bigInteger('nik');
            $table->bigInteger('npwp')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->integer('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
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
        Schema::dropIfExists('data_mahasiswas');
    }
};
