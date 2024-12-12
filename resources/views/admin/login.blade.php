<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Inicio Sesión | Gestión | MusicWorld</title>
</head>

<body>
    <div>
        <div class="shadow-lg container-sm border position-absolute top-50 start-50 translate-middle bg-dark text-white py-5 rounded" style="width: 520px;">
            <p class="text-center fw-bold fs-3">Inicio de Sesión Administradores</p>
            <form>
                <div class="mb-3">
                    <label for="correoInput" class="form-label">Correo Electronico</label>
                    <input type="email" class="form-control" id="correoInput">
                    <div id="emailHelp" class="form-text">Nunca compartiremos tu email con nadie.</div>
                </div>
                <div class="mb-3">
                    <label for="passwordInput" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="passwordInput">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary mt-3">Iniciar Sesión</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>