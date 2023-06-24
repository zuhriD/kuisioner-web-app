<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppl extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // make relationship with kuisioner
    public function kuisioner()
    {
        return $this->hasMany(Kuisioner::class);
    }
}
