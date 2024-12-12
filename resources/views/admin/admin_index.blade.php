@extends('layouts.app')
<title>Index | Gestión | CelipitoMusics</title>
@section('content')
    <div class="container-sm d-flex flex-column">
        <div class="align-self-center">
            <h4 class="my-4 ">Bienvenido</h4>
        </div>
        <div class="card">
            <div class="row justify-content-center align-items-center g-2">
                <div class="col my-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Gestion de Generos Musicales</h5>
                            <p class="card-text">Podras gestionar los generos musicales que son asociados a cada lanzamiento,
                                añadiendo, modificando y eliminar generos.
                            </p>
                            <a href="{{ url('admin/gestion_generos') }}" class="btn btn-primary">Ir a gestion de generos</a>
                        </div>
                    </div>
                </div>
                <div class="col my-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Gestion de Artistas</h5>
                            <p class="card-text">Podras gestionar los artistas musicales, puedes añadir, modificar y eliminar artistas.
                            </p>
                            <a href="{{ url('admin/gestion_artistas') }}" class="btn btn-primary">Ir a gestion de artistas</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center g-2">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Gestion de Lanzamientos</h5>
                            <p class="card-text">Podras gestionar los lanzamientos de artistas, estos pueden ser albums, eps o sencillos. Puedes añadir, modificar y eliminar lanzamientos.
                            </p>
                            <a href="{{ url('admin/gestion_lanzamientos') }}" class="btn btn-primary">Ir a gestion de lanzamientos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
