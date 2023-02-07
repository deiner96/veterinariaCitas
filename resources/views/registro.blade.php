<! DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>REGISTRO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-center p-4">REGISTRO</h2>
    <main class="container mb-4 p-3 align-center">
        <form method="POST" action="{{route('validar-registro')}}">
            @csrf
        <div class="mb-3">
            <label for="cedula" class="form-label"> cedula</label>
            <input type="number" class="form-control" id="ccInput" name="documento_cliente" required autocomplete="disable">
        </div>
        <div class="mb-3">
            <label for="cedula" class="form-label"> nombres</label>
            <input type="text" class="form-control" id="nameInput" name="name" required autocomplete="disable">
        </div>
        <div class="mb-3">
            <label for="cedula" class="form-label"> Apellidos</label>
            <input type="text" class="form-control" id="lastnameInput" name="apellidos" required autocomplete="disable">
        </div>
        <div class="mb-3">
            <label for="cedula" class="form-label"> email</label>
            <input type="email" class="form-control" id="mailInput" name="email" required autocomplete="disable">
        </div>
        <div class="mb-3">
            <label for="cedula" class="form-label"> celular</label>
            <input type="number" class="form-control" id="celInput" name="celular" required autocomplete="disable">
        </div>
        <div class="mb-3">
            <label for="passwordInput" class="form-label"> password</label>
            <input type="password" class="form-control" id="passInput" name="password" required autocomplete="disable">
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
    </main>
</body>

</html>
