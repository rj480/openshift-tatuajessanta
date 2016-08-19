<?php

namespace Santasangre\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Santasangre\Http\Requests;
use Santasangre\Http\Controllers\Controller;
use Santasangre\Modelos\Tatuador;
class TatuadorController extends Controller
{
    
    protected $tatuador;

    public function __construct(Tatuador $tatuador)
    {
        $this->tatuador = $tatuador;
    }

    public function index()
    {
        $tatuadores = $this->tatuador->paginate();
        return view('admin.tatuador.index',compact('tatuadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tatuador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
       
        $archivo = $request->file('file');
        $destinoPath=public_path().'/imagenes/tatuador';
        $url_imagen =$archivo->getClientOriginalName();
        $subir = $archivo->move($destinoPath, $archivo->getClientOriginalName());

        

        $tatuadores = new $this->tatuador;
        $tatuadores->fill([
            'nombres' => $request->get('nombres'),
            'apellidos' => $request->get('apellidos'),
            'telefono' => $request->get('telefono'),
            'red_social' => $request->get('red_social'),
            'descripcion' => $request->get('descripcion'),
            'imagen' => $url_imagen


            ]);
        $tatuadores->save();

        return redirect()->route('administrador.tatuadores.create')->with('message','el tatuador fue creado con exito');

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tatuadores = $this->tatuador->findOrFail($id);
        return view('admin.tatuador.edit',compact('tatuadores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tatuador = $this->tatuador->findOrFail($id);

        $archivo = $request->file('file');
        $destinoPath=public_path().'/imagenes/';
        $url_imagen =$archivo->getClientOriginalName();
        $subir = $archivo->move($destinoPath, $archivo->getClientOriginalName());

        

        $tatuador = new $this->tatuador;
        $tatuador->fill([
            'nombres' => $request->get('nombres'),
            'apellidos' => $request->get('apellidos'),
            'telefono' => $request->get('telefono'),
            'red_social' => $request->get('red_social'),
            'descripcion' => $request->get('descripcion'),
            'imagen' => $url_imagen


            ]);
        $tatuador->save();

        return redirect()->route('administrador.tatuadores.index')->with('message','El Tatuador fue Editado ');;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tatuador= $this->tatuador->findOrFail($id);

     if ($tatuador->delete()) {
        return redirect()->route('administrador.tatuadores.index')->with('message', 'Se ha eliminado toda la información del Tatuador');
    }   
    }
}
