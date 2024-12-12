@extends('layouts.app')
<title>Crear Género | Gestión | CelipitoMusics</title>
@section('content')
    <div class="container-sm border rounded shadow">
        <div class="align-self-center">
            <p class="my-4 p text-center fw-bold fs-3">Crear un nuevo género</p>
        </div>
        <form action="{{url('admin/gestion_generos')}}" method="POST">
            @csrf
            @include('admin.gestion_generos.admin_gestor_generos_form')
            <hr>
            <div class="d-grid gap-2 my-4">
                <input name="crearGenero" id="submit" class="btn btn-primary" type="submit" value="Crear Genero">
            </div>
        </form>
    </div>
@endsection
