<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>CITAS VETERINARIA</title>
    <link href='{{ asset("assets/libraries/full_calendar/core/main.css") }}' rel='stylesheet' />
    <link href='{{ asset("assets/libraries/full_calendar/daygrid/main.css") }}' rel='stylesheet' />
    <link href='{{ asset("assets/libraries/full_calendar/timegrid/main.css") }}' rel='stylesheet' />
    <link href='{{ asset("assets/libraries/full_calendar/bootstrap/main.css") }}' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="text-center w-100 p-4">
        @include('menu')
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible close-modal">
          <a onclick="closeM()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         <strong> {{ session('message') }}</strong>
        </div>
    @endif
    <div class="row">
        <div class="card col">
            <div id="calendar"></div>
        </div>
    </div>

<div class="modal fade" id="calendario_modal" data-backdrop="static" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agendar Cita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="form_citas">
              @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Fecha</label>
                        <input type="date" class="form-control" name="fecha_registro" id="fecha_registro">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Hora inicial</label>
                        <input type="time" class="form-control" name="hora_inicial" required id="hora_inicial">
                        <div id="info"></div>
                    </div>
                    <div id="info"></div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Duración cita</label>
                        <input type="number" class="form-control" id="duracion" >
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Propietario</label>
                    <input name="propietario" type="text" value="{{ auth()->user()->name }}">
                </div>
                <div class="form-group">
                    <label for="">#Contacto</label>
                    <input type="text" name="celular_cliente" id="celular_cliente" value="{{ auth()->user()->celular }}">
                </div>
                <div class="form-group">
                    <label for="">Selecciona una de tus mascotas"</label>
                    <select id="mascota" name="mascota" class="form-control" required>
                        @foreach ($mascotas as $mascota)
                            <option value="{{ $mascota['id']}}">{{ $mascota['nombre']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Novedad</label>
                    <textarea id="txtDescription" class="form-control" required cols="30" rows="6" name="novedad"></textarea>
                </div>
            </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button onclick="guardar()" type="button" class="btn btn-success">Guardar</button>
      </div>
    </div>
  </div>
</div>
</div>
<script src='{{ asset("assets/libraries/full_calendar/core/main.js")}}'></script>
<script src='{{ asset("assets/libraries/full_calendar/interaction/main.js")}}'></script>
<script src='{{ asset("assets/libraries/full_calendar/daygrid/main.js")}}'></script>
<script src='{{ asset("assets/libraries/full_calendar/timegrid/main.js")}}'></script>
<script src='{{ asset("assets/libraries/full_calendar/core/locales/es.js")}}'></script>
<script src="{{ asset('assets/libraries/moment/moment.min.js')}}"></script>

<script src="{{asset('assets/libraries/jQuery/jquery-3.6.3.min.js')}}"></script>
<script src="{{asset('assets/libraries/bootstrap-4.1.1/js/bootstrap.bundle.min.js')}}"></script>


<script>
    const limit=[
        ["00:00", "23:00"]
    ];

    document.querySelector("input[type=time]").addEventListener("change", function() {
        // obtenemos el valor introducido por el usuario
        const user = this.value.split(":");

        // recorremos todas las fechas limite
        // Si devuelve true, esta entre algunas de las fechas
        const result = limit.some(el => {
            let start = el[0].split(":");
            let end = el[1].split(":");

            // comprobamos que este entre las fechas limite
            return (start[0]<user[0] || (start[0]==user[0] && start[1]<=user[1])) && (end[0]>user[0] || (end[0]==user[0] && end[1]>=user[1]))
        });
        if(result){
            document.getElementById("info").innerHTML = "Hora habilitada";
        }else{
            var hora_inicial = moment().format("HH:mm");
            alert("no puede registar citas despues de las 11: pm");
            $('input[type="time"]').val(hora_inicial);
        }
    });

setTimeout(function() {
        $(".close-modal").fadeOut(1500);
    },1600);
function closeM() {
    $('.close-modal').addClass('d-none');
}
function limpiar() {
    $('#calendario_modal').modal('hide');
    $('#txtDescription').val("");
}
var calendar = null;
$(function () {
    var calendarEl = document.getElementById('calendar');

        calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'es',
        plugins: ['interaction', 'dayGrid', 'timeGrid' ],
        header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
         navLinks: true, // can click day/week names to navigate views
         selectable: true,
         selectMirror: true,
         dateClick: function(info) {
            var date = new Date(info.dateStr);
            var hoy = new Date();
            var ayer = new Date(hoy - 24 * 60 * 60 * 1000);
            let fecha = moment(info.dateStr).format("YYYY-MM-DD")
            var hora_inicial = moment().format("HH:mm")
            // var myDate = new Date();
            // hours = myDate.getHours();
            // minutes = myDate.getMinutes();
            // if (hours < 10) hours = 0 + hours;
            // if (minutes < 10) minutes = "0" + minutes;
            // let hora_inicial = hours+ ":" +minutes;

             if(date < ayer) {
                 alert('no se puede registrar citas en fechas anteriores');

             }else{
                 $("#calendario_modal").modal();
                 $("#fecha_registro").val(fecha);
                 $("#hora_inicial").val(hora_inicial);
                 // $("#hora_inicial").val(hours+ ":" +minutes);
                 $("#duracion").val(45);
                 $("#calendario_modal").modal();
                 calendar.unselect()
             }
         },
         editable: true,
         events: '/cita/listar',
        });
        calendar.render();
    })

    function guardar(){
        var form_data = new FormData(document.getElementById("form_citas"));
        let fecha = $("#fecha_registro").val();
        let hora = $("#hora_inicial").val();
        let tiempo = $("#duracion").val();
        let hora_inicial = moment(fecha+" "+hora).format('HH:mm:ss');
        let hora_final = moment(fecha+" "+hora).add(tiempo, 'm').format('HH:mm:ss');

        form_data.append("hora_inicial", hora_inicial);
        form_data.append("hora_final", hora_final);

        $.ajax({
            url: "/cita/guardar",
            type: "POST",
            data: form_data,
            processData: false,
            contentType: false
        }).done(function(respuesta){
            if(respuesta && respuesta.ok){
                calendar.refetchEvents();
                alert("se registró la cita correctamente");
                limpiar();
            }else{
                alert("la fecha ya no está disponible");
            }
        })
    };

</script>
</body>
</html>
