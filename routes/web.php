<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenerosController;
use App\Http\Controllers\ArtistasController;
use App\Http\Controllers\CancionesController;
use App\Http\Controllers\LanzamientosController;
use Illuminate\Http\Request;
use App\Models\Canciones;
use App\Models\Artistas;
use App\Models\Realiza;
use Illuminate\Support\Facades\DB;
use App\Models\Lanzamientos;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/', function () {
    return redirect('inicio');
});

Route::get('/acerca', function () {
    return view('usuario.about');
});

Route::get('/contacto', function () {
    return view('usuario.contact');
});

Route::get('/terminocondiciones', function () {
    return view('usuario.terminos_condiciones');
});

Route::get('/inicio', function () {
    $lanzamientos = DB::table('lanzamientos')->select(DB::raw('lanzamientos.id as id_lanzamiento, artistas.id as id_artista, nombre_lanzamiento, nombre_genero, nombre_artista, descripcion_lanzamiento, caratula, tipo'))->join('canciones','canciones.id_lanzamiento', '=', 'lanzamientos.id')->join('generos', 'lanzamientos.id_genero', '=', 'generos.id')->join('realizas', 'lanzamientos.id', '=', 'realizas.id_lanzamiento')->join('artistas', 'realizas.id_artista', '=', 'artistas.id')->where('fecha_lanzamiento', '>=', '01-01-2022')->orderByRaw('sum(canciones.reproducciones) DESC')
    ->groupByRaw('lanzamientos.id, nombre_genero, artistas.id, nombre_artista, descripcion_lanzamiento, lanzamientos.tipo,nombre_lanzamiento, caratula')->limit(3)->get();
    $artistas = DB::table('artistas')->select(DB::raw('artistas.id, nombre_artista, imagen_artista'))->join('realizas', 'realizas.id_artista', '=', 'artistas.id')->join('lanzamientos', 'lanzamientos.id', '=', 'realizas.id_lanzamiento')->join('canciones', 'canciones.id_lanzamiento', '=', 'lanzamientos.id')->orderByRaw('sum(canciones.reproducciones) DESC')
    ->groupByRaw('artistas.id, nombre_artista, imagen_artista')->limit(3)->get();
    return view('usuario.inicio')->with(compact('lanzamientos'))->with(compact('artistas'));
});

Route::get('/lanzamientos/albums', function () {
    $lanzamientos = DB::table('lanzamientos')->select(DB::raw('lanzamientos.id, nombre_genero, nombre_artista, nombre_lanzamiento, sum(canciones.reproducciones) as reproducciones, caratula'))->join('canciones', 'canciones.id_lanzamiento', '=','lanzamientos.id')->join('generos', 'lanzamientos.id_genero', '=', 'generos.id')->join('realizas', 'lanzamientos.id', '=', 'realizas.id_lanzamiento')->join('artistas', 'realizas.id_artista', '=', 'artistas.id')->where('fecha_lanzamiento', '>=', '01-01-2022')->where('lanzamientos.tipo', '=', 'Album')->orderByRaw('sum(canciones.reproducciones) DESC')
                                            ->groupByRaw('lanzamientos.id, nombre_genero, nombre_artista, nombre_lanzamiento, caratula')->paginate(5);
    return view('usuario.lanzamientos_top')->with(compact('lanzamientos'));
});

Route::get('/lanzamientos/eps', function () {
    $lanzamientos = DB::table('lanzamientos')->select(DB::raw('lanzamientos.id, nombre_genero, nombre_artista, nombre_lanzamiento, sum(canciones.reproducciones) as reproducciones, caratula'))->join('canciones', 'canciones.id_lanzamiento', '=','lanzamientos.id')->join('generos', 'lanzamientos.id_genero', '=', 'generos.id')->join('realizas', 'lanzamientos.id', '=', 'realizas.id_lanzamiento')->join('artistas', 'realizas.id_artista', '=', 'artistas.id')->where('fecha_lanzamiento', '>=', '01-01-2022')->where('lanzamientos.tipo', '=', 'EP')->orderByRaw('sum(canciones.reproducciones) DESC')->groupByRaw('lanzamientos.id, nombre_genero, nombre_artista, nombre_lanzamiento, caratula')->paginate(5);
    return view('usuario.lanzamientos_top')->with(compact('lanzamientos'));
});

Route::get('/lanzamientos/sencillos', function () {
    $lanzamientos = DB::table('lanzamientos')->select(DB::raw('lanzamientos.id, nombre_genero, nombre_artista, nombre_lanzamiento, sum(canciones.reproducciones) as reproducciones, caratula'))->join('canciones', 'canciones.id_lanzamiento', '=','lanzamientos.id')->join('generos', 'lanzamientos.id_genero', '=', 'generos.id')->join('realizas', 'lanzamientos.id', '=', 'realizas.id_lanzamiento')->join('artistas', 'realizas.id_artista', '=', 'artistas.id')->where('fecha_lanzamiento', '>=', '01-01-2022')->where('lanzamientos.tipo', '=', 'Sencillo')->orderByRaw('sum(canciones.reproducciones) DESC')->groupByRaw('lanzamientos.id, nombre_genero, nombre_artista, nombre_lanzamiento, caratula')->paginate(5);
    return view('usuario.lanzamientos_top')->with(compact('lanzamientos'));
});
Route::get('/lanzamientos/busqueda', function (Request $request) {
    $parametro = $request->get('getParametro');
    $lanzamientos = DB::table('lanzamientos')->select(DB::raw('lanzamientos.id, nombre_genero, nombre_artista, nombre_lanzamiento, sum(canciones.reproducciones) as reproducciones, caratula'))->join('canciones', 'canciones.id_lanzamiento', '=','lanzamientos.id')->join('generos', 'lanzamientos.id_genero', '=', 'generos.id')->join('realizas', 'lanzamientos.id', '=', 'realizas.id_lanzamiento')->join('artistas', 'realizas.id_artista', '=', 'artistas.id')->where('fecha_lanzamiento', '>=', '01-01-2022')->where('lanzamientos.tipo', 'LIKE', '%'.$parametro.'%')->orWhere('nombre_lanzamiento','LIKE', '%'.$parametro.'%')->orWhere('nombre_artista', 'LIKE', '%'.$parametro.'%')->orWhere('nombre_genero','LIKE', '%'.$parametro.'%')
    ->groupByRaw('lanzamientos.id, nombre_genero, nombre_artista, nombre_lanzamiento, caratula')->paginate(5);
    return view('usuario.busqueda', ['parametro'=>$parametro])->with(compact('lanzamientos'));
});
Route::get('/lanzamientos/{id}', function ($id) {
    $lanzamiento = DB::table('lanzamientos')->select('lanzamientos.id', 'nombre_lanzamiento', 'descripcion_lanzamiento', 'caratula', 'lanzamientos.tipo', 'lanzamientos.fecha_lanzamiento','nombre_artista', 'descripcion_artista', 'imagen_artista', 'artistas.id as id_artista', 'nombre_genero')->join('generos', 'lanzamientos.id_genero', '=', 'generos.id')->join('realizas', 'lanzamientos.id', '=', 'realizas.id_lanzamiento')->join('artistas', 'realizas.id_artista', '=', 'artistas.id')->where('lanzamientos.id', '=', $id)->first();
    $canciones = DB::table('canciones')->select('num_pista', 'titulo', 'canciones.duracion', 'canciones.reproducciones')->join('lanzamientos', 'lanzamientos.id', '=', 'canciones.id_lanzamiento')->where('lanzamientos.id', '=', $id)->get();
    $cancionesInfo = DB::table('canciones')->select(DB::raw('count(canciones.id) as track_count, sum(canciones.duracion) as duration_sum, sum(canciones.reproducciones) as plays_sum'))->join('lanzamientos', 'lanzamientos.id', '=', 'canciones.id_lanzamiento')->where('lanzamientos.id', '=', $id)->groupBy('lanzamientos.id')->first();
    return view('usuario.info_lanzamiento')->with(compact('lanzamiento'))->with(compact('canciones'))->with(compact('cancionesInfo'));
});

Route::get('/artista/{id}', function ($id) {
    $artista = DB::table('artistas')->where('id', '=', $id)->first();
    $albums = DB::table('lanzamientos')->select(DB::raw('lanzamientos.id, nombre_lanzamiento, caratula, tipo, fecha_lanzamiento, sum(canciones.duracion) as duracion, sum(canciones.reproducciones) as reproducciones,nombre_genero'))->join('canciones', 'canciones.id_lanzamiento', '=','lanzamientos.id')->join('generos', 'lanzamientos.id_genero', '=', 'generos.id')->join('realizas', 'lanzamientos.id', '=', 'realizas.id_lanzamiento')->join('artistas', 'realizas.id_artista', '=', 'artistas.id')->where('artistas.id', '=', $id)->where('lanzamientos.tipo', '=', 'Album')->orderByRaw('sum(canciones.reproducciones) DESC')->groupByRaw('lanzamientos.id, lanzamientos.nombre_lanzamiento, lanzamientos.caratula, lanzamientos.tipo, lanzamientos.fecha_lanzamiento, generos.nombre_genero')->limit(3)->get();
    $eps = DB::table('lanzamientos')->select(DB::raw('lanzamientos.id, nombre_lanzamiento, caratula, tipo, fecha_lanzamiento, sum(canciones.duracion) as duracion, sum(canciones.reproducciones) as reproducciones,nombre_genero'))->join('canciones', 'canciones.id_lanzamiento', '=','lanzamientos.id')->join('generos', 'lanzamientos.id_genero', '=', 'generos.id')->join('realizas', 'lanzamientos.id', '=', 'realizas.id_lanzamiento')->join('artistas', 'realizas.id_artista', '=', 'artistas.id')->where('artistas.id', '=', $id)->where('lanzamientos.tipo', '=', 'EP')->orderByRaw('sum(canciones.reproducciones) DESC')->groupByRaw('lanzamientos.id, lanzamientos.nombre_lanzamiento, lanzamientos.caratula, lanzamientos.tipo, lanzamientos.fecha_lanzamiento, generos.nombre_genero')->limit(3)->get();
    $sencillos = DB::table('lanzamientos')->select(DB::raw('lanzamientos.id, nombre_lanzamiento, caratula, tipo, fecha_lanzamiento, sum(canciones.duracion) as duracion, sum(canciones.reproducciones) as reproducciones,nombre_genero'))->join('canciones', 'canciones.id_lanzamiento', '=','lanzamientos.id')->join('generos', 'lanzamientos.id_genero', '=', 'generos.id')->join('realizas', 'lanzamientos.id', '=', 'realizas.id_lanzamiento')->join('artistas', 'realizas.id_artista', '=', 'artistas.id')->where('artistas.id', '=', $id)->where('lanzamientos.tipo', '=', 'Sencillo')->orderByRaw('sum(canciones.reproducciones) DESC')->groupByRaw('lanzamientos.id, lanzamientos.nombre_lanzamiento, lanzamientos.caratula, lanzamientos.tipo, lanzamientos.fecha_lanzamiento, generos.nombre_genero')->limit(3)->get();
    
    $albumsCount = $albums->count();
    $epsCount = $eps->count();
    $sencillosCount = $sencillos->count();

    $lanzamientosCount = array('albums'=>$albumsCount, 'eps'=>$epsCount, 'sencillos'=>$sencillosCount);
    return view('usuario.info_artista')->with(compact('albums'))->with(compact('artista'))->with(compact('sencillos'))->with(compact('eps'))->with(compact('lanzamientosCount'));
});


Auth::routes();

Route::get('/home', function () {
    return view('admin.admin_index');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/index', function () {
        return view('admin.admin_index');
    });
    Route::get('/admin/gestion_canciones/byRelease/{id}', function ($id) {
        $lanzamiento = Lanzamientos::findOrFail($id);
        $canciones = DB::table('canciones')->where('id_lanzamiento', '=', $id)->paginate(7);
        return view('admin.gestion_canciones.admin_gestor_canciones', compact('lanzamiento'))->with(compact('canciones'));
    });

    Route::get('/admin/gestion_canciones/create/{id}', function ($id) {
        return view('admin.gestion_canciones.admin_gestor_canciones_create')->with('id', $id);
    });

    Route::resource('admin/gestion_generos', GenerosController::class);

    Route::resource('admin/gestion_artistas', ArtistasController::class);

    Route::resource('admin/gestion_lanzamientos', LanzamientosController::class);

    Route::resource('admin/gestion_canciones', CancionesController::class);
});
