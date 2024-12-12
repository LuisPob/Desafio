@extends('layouts.app')
<title>Crear Lanzamiento | Gestión | CelipitoMusics</title>
@section('content')
    <div class="container-sm border rounded shadow my-5">
        <div class="align-self-center">
            <p class="my-4 p text-center fw-bold fs-3">Crear un nuevo lanzamiento</p>
        </div>
        <form action="{{ url('admin/gestion_lanzamientos') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.gestion_lanzamientos.admin_gestor_lanzamientos_form')
            <hr>
            <div class="d-grid gap-2 my-4">
                <input id="submit" name="crearLanzamiento" class="btn btn-primary" type="submit" value="Crear Lanzamiento">
            </div>
        </form>
    </div>
@endsection
