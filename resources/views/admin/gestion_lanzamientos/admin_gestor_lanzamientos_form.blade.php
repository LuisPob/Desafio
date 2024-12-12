<div class="container-sm px-5">
    <div class="mb-3">
        <label for="nombre_lanzamiento" class="form-label">Nombre del lanzamiento</label>
        <input type="text" placeholder="Nombre lanzamiento" class="form-control" id='nombre_lanzamiento'
            name='nombre_lanzamiento'
            value="{{ isset($lanzamiento->nombre_lanzamiento) ? $lanzamiento->nombre_lanzamiento : '' }}" required>
    </div>
    <div class="mb-3">
        <label for="id_genero" class="form-label">Genero Musical del Lanzamiento</label>
        <select class="form-select" id="id_genero" name="id_genero" aria-label="Default select example"
            value='{{ isset($lanzamiento->id_genero) ? $lanzamiento->id_genero : '' }}' required>
            <option selected>Seleccionar Genero Musical</option>
            @foreach ($generos as $genero)
                <option value="{{ $genero->id }}">{{ $genero->nombre_genero }}</option>
            @endforeach

        </select>
    </div>
    <div class="mb-3">
        <label for="id_artista" class="form-label">Artista del Lanzamiento</label>
        <input class="form-control" list="datalistArtistas" id="id_artista" name="id_artista" placeholder="Buscar Artista..." value='{{ isset($getIdartista) ? $getIdartista : '' }}' required>
        <datalist id="datalistArtistas" style='color:black;'>
            @foreach ($artistas as $artista)
                <option value="{{ $artista->id }}">{{ $artista->nombre_artista }}</option>
            @endforeach
        </datalist>
    </div>
    <div class="mb-3">
        <label for="fecha" class="form-label">Fecha de Lanzamiento</label>
        <input type="date" placeholder="Fecha" class="form-control" id='fecha' name='fecha_lanzamiento'
            value="{{ isset($lanzamiento->fecha_lanzamiento) ? $lanzamiento->fecha_lanzamiento : '' }}" required>
    </div>

    <div class="my-3">
        <label for="descripcion_lanzamiento" class="form-label">Descripción del lanzamiento</label>
        <textarea class="form-control" id='descripcion_lanzamiento' placeholder="Descripcion" name='descripcion_lanzamiento'
            required>
@if (isset($lanzamiento->descripcion_lanzamiento))
{{ $lanzamiento->descripcion_lanzamiento }}
@endif
</textarea>
    </div>
    
    <div class="mb-3">
        <label for="tipo" class="form-label">Tipo de Lanzamiento</label>
        <select class="form-select" id="tipo" name="tipo" aria-label="Default select example" required>
            <option selected value='{{ isset($lanzamiento->tipo) ? $lanzamiento->tipo : '' }}'>Actual: {{ isset($lanzamiento->tipo) ? $lanzamiento->tipo : 'Seleccionar Tipo de Lanzamiento' }}</option>
            <option value="Album">Album</option>
            <option value="EP">EP</option>
            <option value="Sencillo">Sencillo</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Caratula del lanzamiento</label>
        <div class="container">
            @if (isset($lanzamiento->caratula))
                <img class="my-3" src="{{ asset('storage') . '/' . $lanzamiento->caratula }}" alt="none"
                    style="width: 120px">
            @endif
            <input class="form-control" type="file" id="formFile" name="caratula">
        </div>
    </div>

</div>
