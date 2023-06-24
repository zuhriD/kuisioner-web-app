<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;
    protected $fillable = ['kecamatan_id', 'name'];

    //make relationship with kecamatan

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    // make relationship with kuisiner
    public function kuisioner()
    {
        return $this->hasMany(Kuisioner::class);
    }
}
