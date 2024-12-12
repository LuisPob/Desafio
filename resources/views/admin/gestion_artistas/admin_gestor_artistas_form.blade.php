<div class="container-sm px-5">
    
    <div class="mb-3">
        <label for="nombre_artista" class="form-label">Nombre del Artista</label>
        <input type="text" placeholder="Nombre Artista" class="form-control" id='nombre_artista' name='nombre_artista'
            value="{{isset($artista->nombre_artista)?$artista->nombre_artista:'' }}" required>
    </div>
    <div class="mb-3">
        <label for="nombre_genero" class="form-label">Fecha de Inicio (o de nacimiento si es solista)</label>
        <input type="date" placeholder="Genero" class="form-control" id='fecha' name='fecha'
            value="{{isset($artista->fecha)?$artista->fecha:''}}" required>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Imagen del Artista</label>
        <div class="container">
            @if (isset($artista->imagen_artista))
            <img class="my-3" src="{{ asset('storage') . '/' . $artista->imagen_artista }}" alt="none" style="width: 120px">
            @endif
            <input class="form-control" type="file" id="formFile" name="imagen_artista">
        </div>

    </div>
    <div class="my-3">
        <label for="descripcion_genero" class="form-label">Descripción del Artista</label>
        <textarea class="form-control" id='descripcion_genero' placeholder="Descripcion" name='descripcion_artista' required>@if(isset($artista->descripcion_artista)){{ $artista->descripcion_artista }}@endif</textarea>
    </div>
</div>
