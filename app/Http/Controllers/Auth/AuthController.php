<?php

namespace Santasangre\Http\Controllers\Auth;


use Validator;
use Santasangre\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Santasangre\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Santasangre\Modelos\Usuarios;
use Santasangre\Modelos\PerfilUsuario;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $usuarios, $perfil;
    
    public function __construct(Usuarios $usuarios, PerfilUsuario $perfil)
    {   
        $this->usuarios = $usuarios;
        $this->perfil = $perfil;
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getLogin()
    {
        return view('front.auth.login');
    }
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'correo' => 'email|required',
            'password' => 'required'
        ]);

        $credentials = $request->only('correo', 'password');

        if (Auth::attempt($credentials, $request->has('rememberme'))) {

            /*return redirect()->intended('/');*/
            // Redirecciona administrador
           if (Auth::user()->tipo == 'admin') {
                return redirect()->intended('administrador/');
            }else{
                //return redirect()->intended('/');
               return \Redirect::to(\Session::get('url.intended'));

            }
        }
        return redirect()->route('vista_login')
            ->withInput($request->only('correo', 'rememberme'))
            ->withErrors([
                'correo' => 'Estas credenciales no coinciden con nuestros registros.',
            ]);
    }

    public function getRegistro()
    {
       
        $generos = ['' => 'Seleccione Uno', 'm' => 'Masculino', 'f' => 'Femenino'];
        return view('front.auth.registro',compact('generos'));


    }

    public function postRegistro(Request $request )
    {
        $usuario = new $this->usuarios;
        $usuario->fill([
                'correo' => $request->get('correo'),
                'password' => $request->get('password'),
                'tipo'=> 'user',

            ]);
        if($usuario->save()){

            $perfil = new $this->perfil;
            $perfil->fill([
                'nombres' => $request->get('nombres'),
                'apellidos'=> $request->get('apellidos'),
                'genero' => $request->get('genero'),
                'fecha_nacimiento'=> $request->get('fecha_nacimiento'),
                'id_usuario' => $usuario->id,

                ]);
            $perfil->save();
            return redirect()->route('registro_usuario')->with('message','El Registro Fue exitoso');
        }

    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }

    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
