<html>

<head>
    <title>Veterinaria</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>

<body style="background-color:#E9FEFC;">
    <div class="container-fluid">
        @include('layouts.user-sidebar')
        <div class="col px-0 text-center">
            <h1 class="mt-5">Veterinaria Animales Contentos <?php ?> </h1>
            <div class="row mx-0 mt-5">
                <div class="d-flex justify-content-center">
                    <div id='calendario'></div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script>
    $(document).ready(function() {
        // Convertir la variable PHP $citas en un array de eventos para FullCalendar
        var eventos = [];
        @foreach ($citas as $cita)
            eventos.push({
                title: 'Cita',
                start: '{{ $cita->fecha_cita }}T{{ $cita->hora_cita }}',
                end: moment('{{ $cita->fecha_cita }}T{{ $cita->hora_cita }}').add(1, 'hours').format(
                    'YYYY-MM-DDTHH:mm:ss'),
                allDay: false
            });
        @endforeach

        // Inicializar el calendario con los eventos
        $('#calendario').fullCalendar({
            events: eventos,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultView: 'month',
            editable: false,
            eventLimit: true,
            eventRender: function(event, element) {
                // Resaltar fechas con citas en verde
                element.css('background-color', '#00b300');

                // Mostrar la hora de la cita
                var hora = moment(event.start).format('h:mm a');
                element.find('.fc-time').html(hora);
            }
        });
    });
</script>

</html>
