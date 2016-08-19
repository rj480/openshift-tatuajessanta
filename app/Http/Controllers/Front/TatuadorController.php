<?php

namespace Santasangre\Http\Controllers\Front;

use Illuminate\Http\Request;

use Santasangre\Http\Requests;
use Santasangre\Http\Controllers\Controller;
use Santasangre\Modelos\Tatuador;
use Santasangre\Modelos\TrabajoTatuador;
class TatuadorController extends Controller
{
    
    protected $tatuador, $trabajotatuador;

    public function __construct(Tatuador $tatuador, TrabajoTatuador $trabajotatuador)
    {
        $this->tatuador = $tatuador;
        $this->trabajotatuador = $trabajotatuador;
    }
    public function getTatuador()
    {
        $tatuadores = $this->tatuador->paginate();
        return view('front.tatuador',compact('tatuadores'));
    }

    public function getTrabajo()
    {
        $trabajos = $this->trabajotatuador->paginate();
        return view('front.trabajos',compact('trabajos'));
    }
    public function getBocetos()
    {
        $bocetos = $this->trabajotatuador->paginate();
        return view('front.bocetos',compact('bocetos'));
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
        //
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
