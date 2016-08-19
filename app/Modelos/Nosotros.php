<?php

namespace Santasangre\Modelos;

use Illuminate\Database\Eloquent\Model;

class Nosotros extends Model
{
     protected $table = 'nosotros';

    
    protected $fillable = ['mision', 'vision'];
}
