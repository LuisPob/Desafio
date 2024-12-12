<?php

namespace App\Http\Controllers;

use App\Models\Generos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class GenerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $parametro = $request->get('inputFilter');
        $datos['generos'] = DB::table('generos')
                            ->where('id', 'LIKE', '%'.$parametro.'%')
                            ->orWhere('nombre_genero', 'LIKE', '%'.$parametro.'%')
                            ->orWhere('descripcion_genero', 'LIKE', '%'.$parametro.'%')
                            ->paginate(7);
        return view('admin.gestion_generos.admin_gestor_generos', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gestion_generos.admin_gestor_generos_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosGenero = request()->except(['_token','crearGenero']);
        Generos::insert($datosGenero);
        return redirect('admin/gestion_generos')->with('mensaje','Genero Creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Generos  $generos
     * @return \Illuminate\Http\Response
     */
    public function show(Generos $generos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Generos  $generos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genero=Generos::findOrFail($id);
        return view('admin.gestion_generos.admin_gestor_generos_edit', compact('genero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Generos  $generos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosGenero = request()->except(['_token','editarGenero','_method']);
        Generos::where('id','=',$id)->update($datosGenero);
        return redirect('admin/gestion_generos')->with('mensaje','Genero Modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Generos  $generos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Generos::destroy($id);
        return redirect('admin/gestion_generos')->with('mensaje','Genero Eliminado exitosamente');
    }
}
