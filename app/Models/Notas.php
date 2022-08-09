<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    use HasFactory;

    protected $table = "notas";

    public function ejemplos()
    {
        return $this->hasMany(Ejemplos::class, 'id_nota', 'id');
    }
}
