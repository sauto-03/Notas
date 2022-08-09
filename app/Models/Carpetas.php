<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carpetas extends Model
{
    use HasFactory;

    protected $table = "carpetas";

    #protected $fillable = ['nombre'];

    public function notas()
    {
        return $this->hasMany(Notas::class, 'id_carpeta', 'id');
    }
}
