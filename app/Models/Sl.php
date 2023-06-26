<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sl extends Model
{
    use HasFactory;
    protected $fillable = [
        'desa_id',
        'sub_sls',
        'name'];

    //make relationship with desa
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    // make relationship with kuisioner
    public function kuisioner()
    {
        return $this->hasMany(Kuisioner::class);
    }      
}
