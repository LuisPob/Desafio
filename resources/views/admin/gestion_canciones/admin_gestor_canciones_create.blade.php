@extends('layouts.app')
<title>Crear Canción | Gestión | CelipitoMusics</title>
@section('content')
    <div class="container-sm border rounded shadow my-5">
        <div class="align-self-center">
            <p class="my-4 p text-center fw-bold fs-3">Crear una nueva canción</p>
        </div>
        <form action="{{ url('admin/gestion_canciones') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.gestion_canciones.admin_gestor_canciones_form')
            <hr>
            <div class="d-grid gap-2 my-4">
                <input id="submit" name="crearCancion" class="btn btn-primary" type="submit" value="Crear Cancion">
            </div>
        </form>
    </div>
@endsection
