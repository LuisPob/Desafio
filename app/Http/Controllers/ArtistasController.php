<?php

namespace App\Http\Controllers;

use App\Models\Artistas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class ArtistasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $parametro = $request->get('inputFilter');
        $datos['artistas'] = DB::table('artistas')
                            ->where('id', 'LIKE', '%'.$parametro.'%')
                            ->orWhere('nombre_artista', 'LIKE', '%'.$parametro.'%')
                            ->orWhere('fecha', 'LIKE', '%'.$parametro.'%')
                            ->orWhere('descripcion_artista', 'LIKE', '%'.$parametro.'%')
                            ->paginate(7);
        return view('admin.gestion_artistas.admin_gestor_artistas', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gestion_artistas.admin_gestor_artistas_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosArtista = request()->except(['_token', 'crearArtista']);

        if ($request->hasFile('imagen_artista')) {
            $datosArtista['imagen_artista'] = $request->file('imagen_artista')->store('uploads', 'public');
        }

        Artistas::insert($datosArtista);

        return redirect('admin/gestion_artistas')->with('mensaje','Artista creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artistas  $artistas
     * @return \Illuminate\Http\Response
     */
    public function show(Artistas $artistas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artistas  $artistas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artista = Artistas::findOrFail($id);
        return view('admin.gestion_artistas.admin_gestor_artistas_edit', compact('artista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artistas  $artistas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosArtista = request()->except(['_token', 'editarArtistas', '_method']);

        if ($request->hasFile('imagen_artista')) {
            $Artista = Artistas::findOrFail($id);
            Storage::delete('public/' . $Artista->imagen_artista);

            $datosArtista['imagen_artista'] = $request->file('imagen_artista')->store('uploads', 'public');
        }

        Artistas::where('id', '=', $id)->update($datosArtista);
        return redirect('admin/gestion_artistas')->with('mensaje','Artista modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artistas  $artistas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artista = Artistas::findOrFail($id);
        if( Storage::delete('public/' . $artista->imagen_artista)){
            Artistas::destroy($id);
        }
        
        return redirect('admin/gestion_artistas')->with('mensaje','Artista eliminado exitosamente');
    }
}
