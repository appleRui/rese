<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    use HasFactory;

    public function reserves()
    {
        return $this->hasMany(Reservation::class);
    }

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}
