<div class="container-sm px-5">
    <div class="mb-3">
        <label for="nombre_genero" class="form-label">Nombre del Género</label>
        <input type="text" placeholder="Genero" class="form-control" id='nombre_genero' name='nombre_genero' value='{{isset($genero->nombre_genero)?$genero->nombre_genero:''}}' required>
    </div>
    <div class="my-3">
        <label for="descripcion_genero" class="form-label">Descripción del Género</label>
        <textarea class="form-control" id='descripcion_genero' placeholder="Descripcion" name='descripcion_genero' required>@if(isset($genero->descripcion_genero)){{ $genero->descripcion_genero }}@endif</textarea>
    </div>
</div>

