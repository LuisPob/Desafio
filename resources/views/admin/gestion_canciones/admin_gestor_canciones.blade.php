@extends('layouts.app')
<title>Gestión Canciones | Gestión | CelipitoMusics</title>
@section('content')
    <div class="container-sm d-flex flex-column border rounded shadow">
        <div class="align-self-center">
            <h4 class="my-4 ">Listado de Canciones</h4>
            <h5 class="my-1 ">Lanzamiento: {{ $lanzamiento->nombre_lanzamiento }}</h5>
        </div>
        @if (Session::has('mensaje'))
            @if (Session::has('mensaje'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('mensaje') }}
                </div>
            @endif
        @endif
        <div class="table-responsive caption-top">
            <div class="d-flex">
                <label for="search" class="form-label fs-4 me-3">Buscar</label>
                <input class="form-control me-2" id="inputFilter" type="search" placeholder="Filtrar.."
                    aria-label="Search">
                <a id="crearButton" class="btn btn-primary"
                    href="{{ url('admin/gestion_canciones/create/' . $lanzamiento->id) }}" role="button">Crear nueva
                    canción</a>
            </div>
            <table class="table" id="infoGestion">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ID Lanzamiento</th>
                        <th scope="col">Título</th>
                        <th scope="col">Duración (segundos)</th>
                        <th scope="col">Número de Pista</th>
                        <th scope="col">Reproducciones</th>
                        <th scope="col mx-auto">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($canciones as $cancion)
                        <tr>
                            <td>{{ $cancion->id }}</td>
                            <td>{{ $cancion->id_lanzamiento }}</td>
                            <td>{{ $cancion->titulo }}</td>
                            <td>{{ $cancion->duracion }}</td>
                            <td>{{ $cancion->num_pista }}</td>
                            <td>{{ $cancion->reproducciones }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ url('admin/gestion_canciones/' . $cancion->id . '/edit') }}">Editar</a>
                                        </li>
                                        <li>
                                            <form action="{{ url('admin/gestion_canciones/' . $cancion->id) }}"
                                                method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <div class="d-flex">
                                                    <button type="submit" class="btn btn-light">Eliminar</button>
                                                </div>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $canciones->links() !!}
        </div>

    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#inputFilter").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#infoGestion tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
