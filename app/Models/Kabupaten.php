<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;
    protected $fillable = ['provinsi_id', 'name']; //field yang tersedia

    //make relationship with provinsi
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    //make relationship with kuisiner
    public function kuisioner()
    {
        return $this->hasMany(Kuisioner::class);
    }
}
