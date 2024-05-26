<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos';
    protected $fillable = ['nombre', 'apellidos', 'email', 'telefono', 'fechaNacimiento'];

    public function nota()
    {
        return $this->hasMany(Nota::class, 'id_alumno');
    }
}
