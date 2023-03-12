<?php

namespace App\Http\Controllers;

use App\Models\Mascotas;
use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Clientes::all();
        return view('cliente.index')->with(['clientes' => $clientes]);
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
        //dd(count($request->mascotas));

        $clientes = new Clientes();
        $documento_identidad = $request->doc_identidad;
        $find = Clientes::where('cedula_identidad', $documento_identidad)->first();
        if ($find == null) {
            $clientes->cedula_identidad = $documento_identidad;
            $clientes->nombres = $request->nombres;
            $clientes->apellidos = $request->apellidos;
            $clientes->telefono = $request->telefono;
            $clientes->correo = $request->correo;
            $clientes->save();
        } else {
            return response()->json(['status' => 'false', 'message' => 'El cliente ya se encuentra registrado']);
        }

        for ($i = 0; $i < count($request->mascotas); $i++) {
            $mascotas = new Mascotas();
            $mascotas->id_cliente = $documento_identidad;
            $mascotas->identificador_mascota = $request->mascotas[$i]['id_mascota'];
            $mascotas->nombre = $request->mascotas[$i]['nombre_mascota'];
            $mascotas->tipo_mascota = $request->mascotas[$i]['tipo_mascota'];
            $mascotas->save();
        }
        return response()->json(['status' => 'success', 'message' => 'La información se ha guardado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit(Clientes $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clientes = Clientes::find($id);
        $clientes->nombres = $request->nombres;
        $clientes->apellidos = $request->apellidos;
        $clientes->telefono = $request->telefono;
        $clientes->correo = $request->correo;
        $clientes->save();
        return back()->with('mensaje', 'La información del cliente se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $cedula_identidad = Clientes::where('id', $id)->first();
        Clientes::find($id)->delete();
        Mascotas::where('id_cliente', $cedula_identidad['cedula_identidad'])->delete();
        return back();
    }
}
