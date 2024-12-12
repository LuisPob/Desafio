@extends('usuario.usuario_header')
<title>Busqueda | CelipitoMusics</title>
@section('content')
    <div class="container-sm d-flex flex-column" style="font-family: 'Montserrat', sans-serif;">
        <h4 class="my-4 fw-bold">Lanzamientos (Top Reproducciones)</h4>

        <div class="container">
            <h4 class='my-4'>Busqueda Lanzamientos: {{$parametro}}</h4>
            <hr>
            <div class="container border rounded align-items-center">
                @foreach ($lanzamientos as $lanzamiento)
                    <a href="{{url('lanzamientos/'.$lanzamiento->id)}}" style="text-decoration:none; font-family: 'Montserrat', sans-serif;">
                        <div class="container border rounded bg-dark p-2 text-white my-2 shadow">
                            <div class="row align-items-center">
                                <div class="col-5"><img src="{{ asset('storage') . '/' . $lanzamiento->caratula }}"
                                        alt=""style="width:250px"></div>
                                <div class="col">
                                    <p class="fs-5 fw-bold">{{ $lanzamiento->nombre_artista }}</p>
                                    <p class="fs-5 fw-bold">{{ $lanzamiento->nombre_lanzamiento }}</p>
                                    <p class="fs-5 fw-bold">{{ $lanzamiento->nombre_genero }}</p>
                                    <p class="fs-5 fw-bold">{{ $lanzamiento->reproducciones }} plays
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            {!! $lanzamientos->links() !!}
        </div>
    </div>
@endsection