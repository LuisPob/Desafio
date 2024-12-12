@extends('layouts.app')
<title>Editar Lanzamiento | Gestión | CelipitoMusics</title>
@section('content')
    <div class="container-sm border rounded shadow">
        <div class="align-self-center">
            <p class="my-4 p text-center fw-bold fs-3">Editar lanzamiento</p>
        </div>
        <form action="{{url('admin/gestion_lanzamientos/'.$lanzamiento->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            @include('admin.gestion_lanzamientos.admin_gestor_lanzamientos_form')
            <hr>
            <div class="d-grid gap-2 my-4">
                <input name="editarlanzamiento" id="submit" class="btn btn-primary" type="submit" value="Editar lanzamiento">
            </div>
        </form>
    </div>
@endsection