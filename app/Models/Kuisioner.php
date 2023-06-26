<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuisioner extends Model
{
    use HasFactory;
    protected $fillable = [
        'provinsi_id',
        'kabupaten_id',
        'kecamatan_id',
        'desa_id',
        'sls_id',
        'keluarga_id',
        'pml_id',
        'ppl_id',
        'status_pendataan',
        'tanggal_pendataan',
        'tanggal_pemeriksaan',
        'no_hp',
        'status'
    ];

    //make relationship with provinsi
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    //make relationship with kabupaten
    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    //make relationship with kecamatan
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    //make relationship with desa
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    // make relationship with sls
    public function sls()
    {
        return $this->belongsTo(Sl::class);
    }

    //make relationship with keluarga
    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class);
    }

    //make relationship with pml
    public function pml()
    {
        return $this->belongsTo(Pml::class);
    }

    //make relationship with ppl
    public function ppl()
    {
        return $this->belongsTo(Ppl::class);
    }

}
