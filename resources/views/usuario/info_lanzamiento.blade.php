@extends('usuario.usuario_header')
<title>{{$lanzamiento->nombre_artista}} - {{$lanzamiento->nombre_lanzamiento}} | Informacíon | CelipitoMusics</title>
@section('content')
    <div class="container-sm d-flex flex-column" style="font-family: 'Montserrat', sans-serif;">
        <h4 class="my-4 fw-bold">Lanzamientos (Top Reproducciones)</h4>

        <div class="container overflow-auto">
            <h4 class='my-4'>Informacíon de Lanzamiento </h4>
            <h4 class='my-4'></h4>
            <hr class='my-3'>
            <div class="container border rounded align-items-center bg-black bg-gradient shadow text-white p-5">
                <div class="container-fluid">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col"><img src="{{ asset('storage') . '/' . $lanzamiento->caratula }}" alt=""
                                style="width: 350px"></div>
                        <div class="col">
                            <a href="{{ url('artista/'.$lanzamiento->id_artista) }}" style="text-decoration:none; color:white;">
                                <p class="fs-3">{{ $lanzamiento->nombre_artista }}</p>
                            </a>
                            <p class="fs-3">{{ $lanzamiento->nombre_lanzamiento }}</p>
                        </div>
                    </div>
                </div>
                <hr class='my-4'>
                <div class="container">
                    <p class="fs-4 fw-bold">Descripción del album</p>
                    <p class="fs-5" style="text-align:justify">{{ $lanzamiento->descripcion_lanzamiento }}</p>
                    <hr>
                    <p class="fs-5 fw-bold">Fecha de Lanzamiento: {{ $lanzamiento->fecha_lanzamiento }}</p>
                    <p class="fs-5 fw-bold">Tipo: {{ $lanzamiento->tipo }}</p>
                    <p class="fs-5 fw-bold">Género: {{ $lanzamiento->nombre_genero }}</p>
                </div>
                <hr class='my-4'>
                <div class="container">
                    <p class="fs-4 fw-bold">Pistas</p>
                    <div class="table-responsive">
                        <table class="table table-dark overflow-auto">
                            <thead>
                                <tr>
                                    <th scope="col">No.Pista</th>
                                    <th scope="col">Título</th>
                                    <th scope="col">Duración</th>
                                    <th scope="col">Plays</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($canciones as $cancion)
                                    <tr class="">
                                        <td scope="row">{{ $cancion->num_pista }}</td>
                                        <td>{{ $cancion->titulo }}</td>
                                        <td>{{ gmdate('H:i:s', $cancion->duracion) }}</td>
                                        <td>{{ $cancion->reproducciones }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <td colspan="2">{{ $cancionesInfo->track_count }}</td>
                                <td>{{ gmdate('H:i:s', $cancionesInfo->duration_sum) }}</td>
                                <td>{{ $cancionesInfo->plays_sum }} plays</td>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <hr class='my-4'>
                <div class="container-lg">
                    <p class="fs-4 fw-bold align-self-center">Artista</p>
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col"><img src="{{ asset('storage') . '/' . $lanzamiento->imagen_artista }}"
                                alt="" style="width: 350px" class="d-block align-self-center"></div>
                        <div class="col">
                            <p class="fs-5 d-block" style="text-align:justify">{{ $lanzamiento->descripcion_artista }}</p>
                            <a id="seeArtistInfo" class="btn btn-outline-success align-self-center"
                                href="{{ url('artista/'.$lanzamiento->id_artista) }}" role="button">Ver más información de
                                {{ $lanzamiento->nombre_artista }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
