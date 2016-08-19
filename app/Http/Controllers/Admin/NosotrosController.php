<?php

namespace Santasangre\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Santasangre\Http\Requests;
use Santasangre\Http\Controllers\Controller;
use Santasangre\Modelos\Nosotros;
class NosotrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $nosotros;

    public function __construct(Nosotros $nosotros)
    {
        $this->nosotros = $nosotros;
    }

    public function index()
    {
        return view('admin.contenido.nosotros');
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
        $nosotros = new $this->nosostros;

        $nosotros->fill([
            'mision' => $request->get('mision'),
            'vision' => $request->get('vision')
            ]);
        $nosotros->save();

        return redirect()->route('administrador.nosotros.index')->with('message','el slide fue creado con exito');
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
        //
    }
}
