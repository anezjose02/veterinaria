<?php

namespace App\Http\Controllers;

use App\Models\Mascotas;
use Illuminate\Http\Request;

class MascotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mascota = Mascotas::all();
        return view('mascota.index')->with(['mascota' => $mascota]);
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
        $id_cliente = $request->id_cliente;
        $mascota = Mascotas::select('identificador_mascota')->where('id_cliente', $id_cliente)->latest('identificador_mascota')->first();
        $parts = explode("_#", $mascota->identificador_mascota);
        $number = intval($parts[1]) + 1;
        $newIdentifier = $parts[0] . "_#" . str_pad($number, 2, '0', STR_PAD_LEFT);
        $nuevo_identificador = $newIdentifier;
        //dd($nuevo_identificador);
        $mascotas = new Mascotas();
        $mascotas->id_cliente = $id_cliente;
        $mascotas->identificador_mascota =  $nuevo_identificador;
        $mascotas->nombre = $request->nombre_mascota;
        $mascotas->tipo_mascota = $request->tipo_mascota;
        $mascotas->save();

        return back()->with('mensaje', 'La mascota se ha registrado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function show(Mascotas $mascotas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function edit(Mascotas $mascotas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mascotas = Mascotas::find($id);
        $mascotas->nombre = $request->nombre;
        $mascotas->tipo_mascota = $request->tipo_mascota;
        $mascotas->save();
        //dd($mascotas);
        return back()->with('mensaje', 'La información de la mascota se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mascotas $mascotas)
    {
        //
    }
}
