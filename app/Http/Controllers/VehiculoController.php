<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $vehiculos = Vehiculo::all();
        return view('vehiculos.index', compact('vehiculos'));
    }

    public function create()
    {
        // 
        $modelos = Modelo::all();
        return view('vehiculos.create', compact('modelos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $vehiculo = new Vehiculo();
        $vehiculo->matricula = $request->matricula;
        $vehiculo->modelo_id = $request->modelo_id;
        $vehiculo->km = $request->km;
        $vehiculo->save();

        return redirect()->route('vehiculos.index')->with('succes', 'exito al crear el vehiculo con matricula' . $vehiculo->matricula);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        // mostramos por id
        $vehiculo = Vehiculo::findOrFail($id);
        return view('vehiculos.index')->with('success', 'exito al cargar el vehiculo con matricula' . $vehiculo->matricula); 
    }


    public function buscarVehiculo(Request $request){
        $vehiculos = Vehiculo::where('matricula', 'like', '%' . $request->matricula . '%')->get();
        return view('vehiculos.index', compact('vehiculos'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
