<! DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>CITAS VETERINARIA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <header>
            <div class="text-center mt-3 p-2 mb-3">
                @include('menu')
            </div>
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible close-modal">
                  <a onclick="closeM()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <strong> {{ session('message') }}</strong>
                </div>
            @endif
        </header>
        <h3 class="text-dark mt-5">REGISTRO DE MASCOTAS</h3>

        <main class="container mb-4 p-3 align-center">
            <form method="POST" action="{{route('registros-mascota')}}">
                @csrf
            <div class="mb-3">
                <label for="identificador" class="form-label"> identificador</label>
                <input type="number" class="form-control" id="idenInput" name="identificador" required autocomplete="disable">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label"> nombres</label>
                <input type="text" class="form-control" id="nameInput" name="nombre" required autocomplete="disable">
                <input type="hidden" id="documento_cliente" name="documento_cliente" value="{{ auth()->user()->documento_cliente }}">
            </div>
            <div class="mb-3">
                <label for="mascota" class="form-label"> Tipo mascota</label>
                <select class="form-select" id="tiposInput" name="tipo_mascota" required autocomplete="disable" placeholder="Selecciona el tipo de la mascota">
                    <option>gato</option>
                    <option>perro</option>
                    <option>conejo</option>
                    <option>caballo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
        </main>
    </div>
</body>
<script>
    setTimeout(function() {
            $(".close-modal").fadeOut(1500);
        },1600);
    function closeM() {
        $('.close-modal').addClass('d-none');
    }
</script>
</html>
