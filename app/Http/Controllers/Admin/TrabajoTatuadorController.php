<?php

namespace Santasangre\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Santasangre\Http\Requests;
use Santasangre\Http\Controllers\Controller;
use Santasangre\Modelos\TrabajoTatuador;
use Santasangre\Modelos\Tatuador;

class TrabajoTatuadorController extends Controller
{
    protected $trabajotatuador, $tatuador;
    public function __construct(TrabajoTatuador $trabajotatuador, Tatuador $tatuador)
    {
        $this->tatuador = $tatuador;
        $this->trabajotatuador = $trabajotatuador;
    }

    public function index()
    {
        $trabajotatuador = $this->trabajotatuador->paginate();

        return view('admin.trabajotatuador.index',compact('trabajotatuador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = ['' => 'Seleccione Uno', 'trabajo' => 'Trabajos', 'dibujo' => 'Bocetos'];
        $tatuador = $this->tatuador->getList();
        return view('admin.trabajotatuador.create',compact('categoria','tatuador'));
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
        $destinoPath=public_path().'/imagenes/trabajos';
        $url_imagen =$archivo->getClientOriginalName();
        $subir = $archivo->move($destinoPath, $archivo->getClientOriginalName());

        

        $trabajos = new $this->trabajotatuador;
        $trabajos->fill([
            'categoria' => $request->get('categoria'),
            'id_tatuador' => $request->get('id_tatuador'),
            'descripcion' => $request->get('descripcion'),
            'imagen' => $url_imagen


            ]);
        $trabajos->save();

        return redirect()->route('administrador.trabajos.index')->with('message','creado con exito');
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
        $trabajos = $this->trabajotatuador->findOrFail($id);
        $categoria = ['' => 'Seleccione Uno', 'trabajo' => 'Trabajos', 'dibujo' => 'Bocetos'];
        $tatuador = $this->tatuador->getList();
        return view('admin.trabajotatuador.edit',compact('categoria','tatuador','trabajos'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trabajos= $this->trabajotatuador->findOrFail($id);

     if ($trabajos->delete()) {
        return redirect()->route('administrador.tatuadores.index')->with('message', 'Se ha eliminado toda la información');
    }   
    }
}
