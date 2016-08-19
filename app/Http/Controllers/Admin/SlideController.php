<?php

namespace Santasangre\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Santasangre\Http\Requests;
use Santasangre\Http\Controllers\Controller;
use Santasangre\Modelos\Slide;
class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $slide;
    public function __construct(Slide $slide)
    {
        $this->slide = $slide;
    }

    public function index()
    {
        $slides = $this->slide->paginate();
        return view('admin.contenido.slide',compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $archivo = $request->file('imagen');

        $destinoPath=public_path().'/imagenes/slide';
        $url_imagen =$archivo->getClientOriginalName();
        $subir = $archivo->move($destinoPath, $archivo->getClientOriginalName());

        

        $slides = new $this->slide;
        $slides->fill([
            'titulo' => $request->get('titulo'),
            'descripcion' => $request->get('descripcion'),
            'imagen' => $url_imagen


            ]);
        $slides->save();
        
        return redirect()->route('administrador.slide.index')->with('message','el slide fue creado con exito');
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
        //
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
        $slides = $this->slide->findOrFail($id);

     if ($slides->delete()) {
        return redirect()->route('administrador.contenido.slide')->with('message', 'Se ha eliminado toda la información del slide');
    }    

  }
}
