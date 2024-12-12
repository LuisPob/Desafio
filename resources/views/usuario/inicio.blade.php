@extends('usuario.usuario_header')

@section('content')
    <div class="container-sm d-flex flex-column mt" style="text-decoration:none; font-family: 'Montserrat', sans-serif;">
        <div class="align-self-center">
            <h4 class="my-4 ">Bienvenidos a CelipitoMusics</h4>
        </div>

        <div class="align-self-center my-2">
            <h4>Lanzamientos </h4>
        </div>
        <hr>
        <div class="contain">
            <div class="row justify-content-center align-items-center g-2">
                @foreach ($lanzamientos as $lanzamiento)
                    <div class="card text-center align-items-center mx-2 bg-black bg-gradient text-white border rounded shadow"
                        style="width: 320px; height:568px">
                        <img src="{{ asset('storage') . '/' . $lanzamiento->caratula }}" class="card-img-top" alt="..."
                            style="width:320px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $lanzamiento->nombre_lanzamiento }}</h5>
                            <a href="{{ url('artista/' . $lanzamiento->id_artista) }}"
                                style="text-decoration:none; color:white;">
                                <p class="card-text">{{ $lanzamiento->nombre_artista }}</p>
                            </a>
                            <p class="card-text">{{ $lanzamiento->tipo }} | {{ $lanzamiento->nombre_genero }}</p>
                        </div>
                        <a href="{{ url('lanzamientos/' . $lanzamiento->id_lanzamiento) }}"
                            class="btn btn-outline-success mb-3">Ir al lanzamiento</a>
                    </div>
                @endforeach
            </div>
        </div>


        <div class="align-self-center mt-5">
            <h4>Artistas s</h4>
        </div>
        <hr>
        <div class="contain">
            <div class="row justify-content-center align-items-center g-2">
                @foreach ($artistas as $artista)
                    <div class="card text-center align-items-center mx-2 bg-black bg-gradient text-white border rounded shadow"
                        style="width: 320px; height:568">
                        <img src="{{ asset('storage') . '/' . $artista->imagen_artista }}" class="card-img-top img-fluid"
                            alt="..." style="width: 322px; height: 322px; object-fit: cover;">
                        <div class="card-body overflow-hidden">
                            <h5 class="card-title">{{ $artista->nombre_artista }}</h5>
                            <a href="{{ url('artista/' . $lanzamiento->id_artista) }}" class="btn btn-outline-success">Ir al
                                artista</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
