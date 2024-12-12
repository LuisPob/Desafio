@extends('layouts.app')
<title>Editar Género | Gestión | CelipitoMusics</title>
@section('content')
    <div class="container-sm border rounded shadow">
        <div class="align-self-center">
            <p class="my-4 p text-center fw-bold fs-3">Editar un nuevo género</p>
        </div>
        <form action="{{url('admin/gestion_generos/'.$genero->id)}}" method="POST">
            @csrf
            {{method_field('PATCH')}}
            @include('admin.gestion_generos.admin_gestor_generos_form')
            <div class="d-grid gap-2 my-4">
                <input name="editarGenero" id="submit" class="btn btn-primary" type="submit" value="Editar Genero">
            </div>
        </form>
    </div>
@endsection