@extends("layouts.app")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <a href="/empresa/pacientes">
                <button type="button" class="btn btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')}}"></use>                    
                    </svg>
                    @lang('Regresar')
                </button>
            </a> 
            
            <a href="/pacientes/editar/{{$paciente->id}}">
                <button type="button" class="btn btn-success text-white float-right">                    
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-pencil')}}"></use>                    
                    </svg>                    
                    @lang('Editar')
                </button>
            </a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="{{$paciente->id}}">
                        <i class="fa fa-bars fa-sm"> @lang('Datos Personales')</i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pacientes/acompanantes/{{$paciente->nIdPac}}">
                        <i class="fas fa-user-friends fa-sm" > @lang('Acompañantes')</i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                <dt>
                    <b>@lang('Paciente'): </b>
                    {{$paciente->tipoId}} {{$paciente->nIdPac}} - 
                    {{$paciente->pNom}} {{$paciente->sNom}} {{$paciente->pApe}} {{$paciente->sApe}} 
                </dt>
            </div>
        </div>                     
    </div>

    <div class="row">
        <div class="col-md-auto">
            <dl class="text-right">
                <dt>@lang('Tipo Documento')</dt>
                <dt>@lang('Número Documento')</dt>
                <dt>@lang('Primer Apellido')</dt>
                <dt>@lang('Segundo Apellido')</dt>
                <dt>@lang('Primer Nombre')</dt>
                <dt>@lang('Segundo Nombre')</dt>
                <dt>@lang('Género')</dt>
                <dt>@lang('Fecha Nacimiento')</dt>
                <dt>@lang('Edad')</dt>
                <dt>@lang('Grupo Sanguíneo')</dt>
            </dl>
        </div>
        <div class="col-md-auto">
            <dl class="text-left">                    
                <dt>{{$paciente->tipoId}}</dt>
                <dt>{{$paciente->nIdPac}}</dt>
                <dt>{{$paciente->pApe}}</dt>
                <dt>{{$paciente->sApe}}</dt>
                <dt>{{$paciente->pNom}}</dt>
                <dt>{{$paciente->sNom}}</dt>
                <dt>{{$paciente->genero}}</dt>
                <dt>{{$paciente->fNaci}}</dt>
                <dt>{{$paciente->edad}}</dt>
                <dt>{{$paciente->rh}}</dt>
            </dl>
        </div>
        
        <div class="col-md-auto">
            <dl class="text-right">
                <dt>@lang('Régimen')</dt>
                <dt>@lang('Estado')</dt>
                <dt>@lang('Sede')</dt>
                <dt>@lang('Ciudad')</dt>
                <dt>@lang('Dirección')</dt>
                <dt>@lang('Teléfono')</dt>
                <dt>@lang('Correo')</dt>
                <dt>@lang('Estado Civil')</dt>
                <dt>@lang('Ocupación')</dt>
                <dt>EPS</dt>
            </dl>
        </div>

        <div class="col-md-auto">
            <dl class="text-left">
                <dt>{{$paciente->regimen}}</dt>
                <dt>{{$paciente->estado}}</dt>
                <dt>{{$paciente->nomSede}}</dt>
                <dt>{{$paciente->ciudad}}</dt>
                <dt>{{$paciente->dirResi}}</dt>
                <dt>{{$paciente->telPac}}</dt>
                <dt>{{$paciente->emailPac}}</dt>
                <dt>{{$paciente->eCivil}}</dt>
                <dt>N/A</dt>
                <dt>{{$paciente->nomIPS}}</dt>
            </dl>        
        </div>

        <div class="col-md-auto col-lg-auto">
            
            <br>            
        </div>
    </div>
@endsection