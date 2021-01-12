<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    public function dueño(){
        return $this->belongsTo(User::class);
    }

    public function citas(){
        return $this->HasMany(Cita::class, 'mascota_id');
    }
}
