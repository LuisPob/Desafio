@extends('layouts.app')
<title>Editar Canción | Gestión | CelipitoMusics</title>
@section('content')
    <div class="container-sm border rounded shadow">
        <div class="align-self-center">
            <p class="my-4 p text-center fw-bold fs-3">Editar Canción</p>
        </div>
        <form action="{{url('admin/gestion_canciones/'.$cancion->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            @include('admin.gestion_canciones.admin_gestor_canciones_form')
            <hr>
            <div class="d-grid gap-2 my-4">
                <input name="editarCancion" id="submit" class="btn btn-primary" type="submit" value="Editar Cancion">
            </div>
        </form>
    </div>
@endsection