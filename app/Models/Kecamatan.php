<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $fillable = ['kabupaten_id', 'name'];

    //make relationship with kabupaten
    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    // make relationship with kuisiner
    public function kuisioner()
    {
        return $this->hasMany(Kuisioner::class);
    }
}
