<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Citas;
use Illuminate\Http\Request;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Clientes::all();
        return view('citas.index')->with(['clientes' => $clientes]);;
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
        $citas = new Citas();
        $find = Citas::where('fecha_cita',  $request->fecha)->where('hora_cita',  $request->hora)->first();
        if ($find == null) {
            $citas->documento_identidad = $request->documento_identidad;
            $citas->fecha_cita = $request->fecha;
            $citas->hora_cita = $request->hora;
            $citas->mascota = $request->mascota;
            $citas->save();
        } else {
            return back()->with('mensaje', 'Ya hay una cita para la fecha y hora seleccionada');
        }
        return back()->with('mensaje', 'Cita Agendada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function show(Citas $citas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function edit(Citas $citas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $find = Citas::where('fecha_cita',  $request->fecha)->where('hora_cita',  $request->hora)->first();
        if ($find == null) {
            $citas = Citas::find($id);
            $citas->fecha_cita = $request->fecha;
            $citas->hora_cita = $request->hora;
            $citas->save();
        } else {
            return response()->json(['status' => 'error', 'message' => 'Ya hay una cita para la fecha y hora seleccionada']);
        }
        return response()->json(['status' => 'success', 'message' => 'Cita Actualizada']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Citas::find($id)->delete();
        return back();
    }
}
