<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Carpetas;

class Temas extends Model
{
    use HasFactory;

    protected $table = "temas";

    public function carpetas(){
        return $this->hasMany(Carpetas::class,'id_tema','id');
    }
}
