<?php

namespace App\Http\Controllers;

use App\Models\TipoMascota;
use Illuminate\Http\Request;

class TipoMascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('configuracion.index');
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
        $tipo_mascota = new TipoMascota();

        $mascota = ucfirst($request->tipo_mascota);
        $find = TipoMascota::where('nombre', $mascota)->first();
        //dd($find);
        if ($find == null) {
            $tipo_mascota->nombre = $mascota;
            $tipo_mascota->save();
            return redirect('/configuracion');
        } else return redirect('/configuracion');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoMascota  $tipoMascota
     * @return \Illuminate\Http\Response
     */
    public function show(TipoMascota $tipoMascota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoMascota  $tipoMascota
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoMascota $tipoMascota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoMascota  $tipoMascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoMascota $tipoMascota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoMascota  $tipoMascota
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoMascota $tipoMascota)
    {
        //
    }
}
