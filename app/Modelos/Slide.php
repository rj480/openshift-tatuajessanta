<?php

namespace Santasangre\Modelos;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
     protected $table = 'slide';

    
    protected $fillable = ['titulo', 'imagen','descripcion'];
}
