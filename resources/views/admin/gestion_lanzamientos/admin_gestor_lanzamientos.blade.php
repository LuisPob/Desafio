@extends('layouts.app')
<title>Gestión Lanzamiento | Gestión | CelipitoMusics</title>
@section('content')
    <div class="container-sm d-flex flex-column border rounded shadow">
        <div class="align-self-center">
            <h4 class="my-4 ">Listado de Lanzamientos Musicales</h4>
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
                    <form action="{{ url('admin/gestion_lanzamientos') }}" method="GET">
                        <input class="form-control" id="search" name="inputFilter" type="search"
                            placeholder="Filtrar.." aria-label="Search">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success">Buscar</button>
                </div>
                </form>
            </div>
            <div class="d-flex my-2">
                <a id="crearButton" class="btn btn-primary" href="{{ url('admin/gestion_lanzamientos/create') }}"
                    role="button">Crear nuevo lanzamiento</a>
            </div>
        <div class="table-responsive caption-top">
            

            <table class="table" id="infoGestion">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha Lanzamiento</th>
                        <th scope="col">Caratula</th>
                        <th scope="col">Tipo</th>
                        <th scope="col mx-auto">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lanzamientos as $lanzamiento)
                        <tr>
                            <td>{{ $lanzamiento->id }}</td>
                            <td>{{ $lanzamiento->nombre_lanzamiento }}</td>
                            <td>{{ $lanzamiento->fecha_lanzamiento }}</td>
                            <td><img src="{{ asset('storage') . '/' . $lanzamiento->caratula }}" alt="none"
                                    style="width: 50px"></td>
                            <td>{{ $lanzamiento->tipo }}</td>
                            <td>
                                <div class="btn-group dropend">
                                    <button type="button" class="btn btn-dark dropdown-toggle"
                                        data-bs-toggle="dropdown"aria-haspopup="true"
                                        aria-expanded="false">Acciones</button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ url('admin/gestion_canciones/byRelease/' . $lanzamiento->id) }}">Gestionar
                                                Canciones</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ url('admin/gestion_lanzamientos/' . $lanzamiento->id . '/edit') }}">Editar
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ url('admin/gestion_lanzamientos/' . $lanzamiento->id) }}"
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
            {!! $lanzamientos->links() !!}
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
