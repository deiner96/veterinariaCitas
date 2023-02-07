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
            <div class="text-center mt-3 p-2">
                @include('menu')
            </div>
        </header>
    </div>
    <article class="container">
        <div class="col-md-12 my-5 mx-auto text-center row">
            <h2>Bienvenido {{ auth()->user()->name }}</h2>
            <div class="container overflow-hidden col-md-6 col-12 rounded mt-4 ">
                <div class="row">
                    <div class="col-12">
                        <table id="" class="text-center text-dark table table-striped" width="100%" border="0">
                            <thead>
                                <tr>
                                    <th class="">Numero de celular</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <th class="" style="word-break: break-word">
                                            {{ auth()->user()->celular}}
                                        </th>
                                    </tr>
                                </tbody>
                        </table>
                        <table id="" class="text-center text-dark table table-striped" width="100%" border="0">
                            <thead>
                                <tr>
                                    <th class="">Correo electrónico</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <th style="word-break: break-word">
                                            {{ auth()->user()->email}}
                                        </th>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
                <div class="col-md-6 col-12 mt-3 mb-2">
                        <div class="">
                            @php
                                $mascotas = App\Models\Mascota::where('documento_cliente', '=', auth()->user()->documento_cliente)->get();
                            @endphp
                            <table id="cv-downloads" class="text-center text-dark table table-striped" width="100%" border="0">
                                <thead>
                                    <tr>
                                    <th class="col-3 h4">Tus mascotas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($mascotas as $mascota)
                                                <tr>
                                                    <th>
                                                        {{$mascota['nombre']}}
                                                    </th>
                                                </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                        </div>
                        @if (count($mascotas)<1)
                            <h3>!!Registra tu primer mascota para que puedas agendar citas</h3>
                        @endif
                    </div>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible close-modal">
              <a onclick="closeM()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong> {{ session('message') }}</strong>
            </div>
        @endif

    </article>
</body>
<script data-cfasync="false" type="text/javascript">
setTimeout(function() {
        $(".close-modal").fadeOut(1500);
    },1600);
function closeM() {
    $('.close-modal').addClass('d-none');
}
</script>
</html>
