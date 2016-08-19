<?php

namespace Santasangre\Modelos;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Usuarios extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'usuario';

    protected $fillable = ['correo', 'tipo', 'password','remember_token'];

    
    //relaciones 

    public function perfil()
    {
            return $this->hasOne('Santasangre\Modelos\PerfilUsuario', 'id_usuario');
    }

     public function setPasswordAttribute($value)
    {
        if (! empty($value)) {
            $this->attributes['password'] = \Hash::make($value);
        }
    }
    protected $hidden = ['password', 'remember_token'];


}
