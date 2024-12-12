@extends('usuario.usuario_header')
<title>{{$artista->nombre_artista}} | Informacíon |CelipitoMusics</title>
@section('content')
    <div class="container-sm d-flex flex-column" style="font-family: 'Montserrat', sans-serif;">
        <h4 class="my-4 fw-bold">Lanzamientos (Top Reproducciones)</h4>

        <div class="container overflow-auto">
            <h4 class='my-4'>Informacíon del Artista </h4>
            <h4 class='my-4'></h4>
            <hr class='my-3'>
            <div class="container border rounded align-items-center bg-black bg-gradient shadow text-white p-5">
                <div class="container-fluid">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col"><img src="{{ asset('storage') . '/' . $artista->imagen_artista }}"
                                alt="" style="width: 350px"></div>
                        <div class="col">
                            <p class="fs-1">{{ $artista->nombre_artista }}</p>
                        </div>
                    </div>
                </div>
                <hr class='my-4'>
                <div class="container">
                    <p class="fs-4 fw-bold">Descripción del artista</p>
                    <p class="fs-5" style="text-align:justify">{{ $artista->descripcion_artista }}</p>
                    <hr>
                    <p class="fs-5 fw-bold">Fecha de Origen: {{ $artista->fecha }}</p>
                </div>
                <hr class='my-4'>
                @if ($lanzamientosCount['albums'] > 0)
                    <p class="fs-4 fw-bold">Albumes Destacados (Top 3)</p>
                    @foreach ($albums as $album)
                        <a href="{{ url('lanzamientos/' . $album->id) }}"
                            style="text-decoration:none; font-family: 'Montserrat', sans-serif;">
                            <div class="container border rounded bg-dark bg-gradient p-2 text-white my-2 shadow">
                                <div class="row align-items-center">
                                    <div class="col-5"><img src="{{ asset('storage') . '/' . $album->caratula }}"
                                            alt=""style="width:120px"></div>
                                    <div class="col">
                                        <p class="fs-6 fw-bold">{{ $album->nombre_lanzamiento }}</p>
                                        <p class="fs-6 fw-bold">{{ $album->nombre_genero }}</p>
                                        <p class="fs-6 fw-bold">{{ $album->fecha_lanzamiento }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
                @if ($lanzamientosCount['eps'] > 0)
                    <p class="fs-4 fw-bold">EPs Destacados (Top 3)</p>
                    @foreach ($eps as $ep)
                        <a href="{{ url('lanzamientos/' . $ep->id) }}"
                            style="text-decoration:none; font-family: 'Montserrat', sans-serif;">
                            <div class="container border rounded bg-dark bg-gradient p-2 text-white my-2 shadow">
                                <div class="row align-items-center">
                                    <div class="col-5"><img src="{{ asset('storage') . '/' . $ep->caratula }}"
                                            alt=""style="width:120px"></div>
                                    <div class="col">
                                        <p class="fs-5 fw-bold">{{ $ep->nombre_lanzamiento }}</p>
                                        <p class="fs-6 fw-bold">{{ $ep->nombre_genero }}</p>
                                        <p class="fs-6 fw-bold">{{ $ep->fecha_lanzamiento }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
                @if ($lanzamientosCount['sencillos'] >= 1)
                    <p class="fs-4 fw-bold">Sencillos Destacados (Top 3)</p>
                    @foreach ($sencillos as $sencillo)
                        <a href="{{ url('lanzamientos/' . $sencillo->id) }}"
                            style="text-decoration:none; font-family: 'Montserrat', sans-serif;">
                            <div class="container border rounded bg-dark bg-gradient p-2 text-white my-2 shadow">
                                <div class="row align-items-center">
                                    <div class="col-5"><img src="{{ asset('storage') . '/' . $sencillo->caratula }}"
                                            alt=""style="width:120px"></div>
                                    <div class="col">
                                        <p class="fs-5 fw-bold">{{ $sencillo->nombre_lanzamiento }}</p>
                                        <p class="fs-6 fw-bold">{{ $sencillo->nombre_genero }}</p>
                                        <p class="fs-6 fw-bold">{{ $sencillo->fecha_lanzamiento }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
