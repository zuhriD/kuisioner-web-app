<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluargas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kepala_keluarga');
            $table->string('no_urut_bangunan');
            $table->string('no_urut_keluarga_verifikasi');
            $table->enum('status', ['sangat_miskin', 'miskin', 'tdk_miskin']);
            $table->string('jml_anggota_keluarga');
            $table->string('landmark');
            $table->string('no_kk');
            $table->string('kode_kk');
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
        Schema::dropIfExists('keluargas');
    }
}
