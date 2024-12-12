<?php

namespace App\Http\Controllers;

use App\Models\Canciones;
use App\Models\Lanzamientos;
use App\Models\Artistas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CancionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gestion_canciones.admin_gestor_canciones_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosCancion = request()->except(['_token', 'crearCancion']);
        $lanzamiento = Lanzamientos::findOrFail($datosCancion['id_lanzamiento']);
        if ($lanzamiento->tipo == 'Album' || ($lanzamiento->tipo == 'Sencillo' && $lanzamiento->cantidad_canciones < 1) || ($lanzamiento->tipo == 'EP' && $lanzamiento->cantidad_canciones < 3)) {
            Canciones::insert($datosCancion);
            return redirect('admin/gestion_canciones/byRelease/' . $datosCancion['id_lanzamiento'])->with('mensaje', 'Cancion creado exitosamente');
        } else {
            return redirect('admin/gestion_canciones/byRelease/' . $datosCancion['id_lanzamiento'])->with('mensaje', 'Error: Supera el maximo de canciones de EP o Sencillo');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Canciones  $canciones
     * @return \Illuminate\Http\Response
     */
    public function show(Canciones $canciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Canciones  $canciones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cancion = Canciones::findOrFail($id);
        return view('admin.gestion_canciones.admin_gestor_canciones_edit', compact('cancion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Canciones  $canciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosCancion = request()->except(['_token', 'editarCancion', '_method']);
        Canciones::where('id', '=', $id)->update($datosCancion);
        return redirect('admin/gestion_canciones/byRelease/' . $datosCancion['id_lanzamiento'])->with('mensaje', 'Cancion modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Canciones  $canciones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cancion = Canciones::findOrFail($id);
        $id_lanzamiento = $cancion->id_lanzamiento;
        Canciones::destroy($id);
        return redirect('admin/gestion_canciones/byRelease/' . $id_lanzamiento)->with('mensaje', 'Cancion eliminado exitosamente');
    }
}
