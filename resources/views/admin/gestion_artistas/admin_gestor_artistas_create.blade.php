@extends('layouts.app')
<title>Crear Artista | Gestión | CelipitoMusics</title>
@section('content')
    <div class="container-sm border rounded shadow my-5">
        <div class="align-self-center">
            <p class="my-4 p text-center fw-bold fs-3">Crear un nuevo artista</p>
        </div>
        <form action="{{ url('admin/gestion_artistas') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.gestion_artistas.admin_gestor_artistas_form')
            <hr>
            <div class="d-grid gap-2 my-4">
                <input id="submit" name="crearArtista" class="btn btn-primary" type="submit" value="Crear Artista">
            </div>
        </form>
    </div>
@endsection
