@extends('layouts.app')
@section('contenido')
    <div class="row">
        <div class="card col">
            <div id="calendar">

            </div>
        </div>
    </div>

    <div class="modal fade" id="agendaModal" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Agendar cita')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="formulario_agenda">  
                        @csrf                  
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">@lang('Fecha')</label>
                                    <input type="date" class="form-control" id="txtFecha" name="txtFecha">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">@lang('Hora')</label>
                                    <input type="time" class="form-control" name="txtHoraInicial" id="txtHoraInicial">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">@lang('Duración (minutos)')</label>
                                    <input type="number" class="form-control" name="txtTiempo" id="txtTiempo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">@lang('Paciente')</label>
                                    <select name="ddlUsuarios" class="form-control" id="ddlUsuarios">
                                        <option value="">@lang('Seleccione')</option>
                                        <option value="1">Jean</option>
                                        <option value="2">Hector</option>
                                        <option value="3">Jeremias</option>
                                        <option value="4">Andres</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">@lang('Descripción')</label>
                                    <textarea name="txtDescripcion" class="form-control" id="txtDescripcion" cols="10" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button onclick="guardar()" type="button" class="btn btn-success">@lang('Guardar')</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Cancelar')</button>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('style')
    <link href='{{asset('/assets/dashboard/vendors/lib/main.css')}}' rel='stylesheet' />
@endsection

@section('scripts')
    <script>
        $(function(){ 
            var calendar = null;           
            var calendarEl = document.getElementById('calendar');
            calendar = new FullCalendar.Calendar(calendarEl, {
                eventClick: function(info) {
                    alert("@lang('Nombre del evento'): "+ info.event.title + " \nFecha de inicio: " + moment(info.event.start).format('HH:mm:ss a') + " \nFecha Final: " + moment(info.event.end).format('HH:mm:ss a'));

    // change the border color just for fun
    info.calendar.style.borderColor = 'red';
  },

                initialView: 'listDay',
                timeZone : 'America/Bogota',                
                locale :"es",
                headerToolbar: {
                    left: 'prev,next,today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                selectMirror: true,
                select: function(arg) { 
                    $("#agendaModal").modal();                                        
                    let fecha = moment(arg.startStr).format("YYYY-MM-DD")                    
                    let hora_inicial = moment(arg.startStr).format("HH:mm:ss")                                                      
                    $("#txtFecha").val(fecha);                    
                    $("#txtHoraInicial").val(hora_inicial);                                                                               
                    $("#txtTiempo").val("30");                                                                               
                    calendar.unselect()
                },                
                editable: true,
                events: '/agenda/listar'
            });
            calendar.render();
        })

        function limpiar(){
            $("#agendaModal").modal('hide'); 
            $("#txtFecha").val("");
            $("#ddlUsuarios").val("");                    
            $("#txtHoraInicial").val("");                    
        }

        function guardar(){
            var formulario = new FormData(document.getElementById("formulario_agenda"));            
            let fecha = $("#txtFecha").val();
            let hora = $("#txtHoraInicial").val();
            let tiempo = $("#txtTiempo").val();
            let hora_inicial = moment(fecha+" "+hora).format('HH:mm:ss');
            let hora_final = moment(fecha+" "+hora).add(tiempo, 'm').format('HH:mm:ss');
            formulario.append("txtHoraInicial", hora_inicial);
            formulario.append("txtHoraFinal", hora_final);
            $.ajax({
                url: "/agenda/guardar",
                type: "POST",
                data: formulario,
                processData: false,
                contentType: false
            }).done(function(respuesta){
                if(respuesta && respuesta.ok){                    
                    alert("Se registró la cita en la agenda para el usuario: " + usuario_id);
                    limpiar();                    
                    calendar.refetchEvents();
                }else{
                    alert("Ya hay una cita en esa hora");
                }
            });

        }
    </script>
    
    <script src='{{asset('/assets/dashboard/vendors/lib/main.js')}}'></script>
    <script src='{{asset('/assets/dashboard/vendors/lib/locales/es.js')}}'></script>
    <script src='{{asset('/assets/dashboard/vendors/lib/moment.js')}}'></script>
@endsection