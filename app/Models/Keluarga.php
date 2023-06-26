<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kepala_keluarga',
        'no_urut_bangunan',
        'no_urut_keluarga_verifikasi',
        'status',
        'jml_anggota_keluarga',
        'landmark',
        'no_kk',
        'kode_kk',
        'alamat'
    ];

    // make relationship with kuisioner
    public function kuisioner()
    {
        return $this->hasMany(Kuisioner::class);
    }

}
