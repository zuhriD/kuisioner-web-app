<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuisionersTable extends Migration
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
            $table->foreignId('provinsi_id')->constrained('provinsis')->onDelete('restrict');
            $table->foreignId('kabupaten_id')->constrained('kabupatens')->onDelete('restrict');
            $table->foreignId('kecamatan_id')->constrained('kecamatans')->onDelete('restrict');
            $table->foreignId('desa_id')->constrained('desas')->onDelete('restrict');
            $table->foreignId('sls_id')->constrained('sls')->onDelete('restrict');
            $table->foreignId('keluarga_id')->constrained('keluargas')->onDelete('restrict');
            $table->foreignId('ppl_id')->constrained('ppls')->onDelete('restrict');
            $table->foreignId('pml_id')->constrained('pmls')->onDelete('restrict');
            $table->enum('status_pendataan', ['1', '2', '3', '4', '5']);
            $table->date('tanggal_pendataan');
            $table->date('tanggal_pemeriksaan');
            $table->string('no_hp');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
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
}
