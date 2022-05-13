<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable=['titulo','descripcion','fecha_inicio','fecha_final','estado','prioridad'];
}
