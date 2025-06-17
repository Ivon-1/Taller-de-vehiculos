<?php

namespace App\Http\Controllers;

use App\Models\Revisione;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class RevisionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        // mostrar historial
        $vehiculo = Vehiculo::findOrFail($id);
        $revisiones = $vehiculo->revisiones; // todas las revisiones del vehiculo
        return view('revisiones.historial', compact('vehiculo', 'revisiones'));
    }

    public function create($id)
    {
        // mostrar formulario
        $vehiculo = Vehiculo::findOrFail($id);
        return view('revisiones.create', compact('vehiculo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $vehiculo_id) // pasamos id vehiculo por parametro
    {
        $vehiculo = Vehiculo::findOrFail($vehiculo_id);

        $revision = new Revisione();
        $revision->vehiculo_id = $vehiculo_id;
        $revision->km_revision = $request->km_revision;
        $revision->save();

        // actualizar km
        $vehiculo->km += $request->km_revision;
        $vehiculo->save();
        return redirect()->route('revisiones.historial', $vehiculo->id)->with('success', 'exito al añadir revision');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
}
