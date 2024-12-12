@extends('layouts.app')
<title>Gestión Generos | Gestión | CelipitoMusics</title>
@section('content')
    <div class="container-sm d-flex flex-column border rounded shadow">
        <div class="align-self-center">
            <h4 class="my-4 ">Listado de Géneros Musicales</h4>
        </div>
        @if (Session::has('mensaje'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('mensaje') }}
            </div>
        @endif
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label fs-4">Buscar</label>
            </div>
            <div class="col-auto">
                <form action="{{ url('admin/gestion_generos') }}" method="GET">
                    <input class="form-control" id="search" name="inputFilter" type="search" placeholder="Filtrar.."
                        aria-label="Search">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-success">Buscar</button>
            </div>
            </form>
        </div>
        <div class="table-responsive caption-top">
            <div class="d-flex">
                <a id="crearButton" class="btn btn-primary" href="{{ url('admin/gestion_generos/create') }}"
                    role="button">Crear nuevo género</a>
            </div>
            <table class="table" id="infoGestion">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col mx-auto">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($generos as $genero)
                        <tr>
                            <td>{{ $genero->id }}</td>
                            <td>{{ $genero->nombre_genero }}</td>
                            <td>{{ $genero->descripcion_genero }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ url('admin/gestion_generos/' . $genero->id . '/edit') }}">Editar
                                        </li>
                                        <li>
                                            <form action="{{ url('admin/gestion_generos/' . $genero->id) }}" method="POST">
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
            {!! $generos->links() !!}
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
