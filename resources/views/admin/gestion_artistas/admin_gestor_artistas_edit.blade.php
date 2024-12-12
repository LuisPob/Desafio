@extends('layouts.app')
<title>Editar Artista | Gestión | CelipitoMusics</title>
@section('content')
    <div class="container-sm border rounded shadow">
        <div class="align-self-center">
            <p class="my-4 p text-center fw-bold fs-3">Editar Artista</p>
        </div>
        <form action="{{url('admin/gestion_artistas/'.$artista->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            @include('admin.gestion_artistas.admin_gestor_artistas_form')
            <hr>
            <div class="d-grid gap-2 my-4">
                <input name="editarArtistas" id="submit" class="btn btn-primary" type="submit" value="Editar Artista">
            </div>
        </form>
    </div>
@endsection