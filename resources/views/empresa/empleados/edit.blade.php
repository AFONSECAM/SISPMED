@extends("layouts.app")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <a href="/empresa/empleados">
                <button type="button" class="btn btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')}}"></use>                    
                    </svg>
                    @lang('Regresar')
                </button>
            </a>                         
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-header">
            <strong>@lang('Editar Empleado')</strong>
        </div>
        <div class="card-body">
            @include('flash::message')            
            <form action="/empleados/actualizar" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$empleado->id}}"/>
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item font-weight-bold" aria-current="page">@lang('Datos Personales')</li>
                            </ol>
                          </nav>
                    </div> 
                    
                    <div class="col-sm-12 col-md-3 col-lg-3">                        
                        <div class="form-group">
                            <label for="primerNom">@lang('Primer Nombre')</label>
                            <input type="text"  class="form-control @error('primerNom') is-invalid @enderror" name="primerNom" id="primerNom" value="{{ $empleado->pNom}}">
                            @error('primerNom')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="segundoNom">@lang('Segundo Nombre')</label>
                            <input type="text"  class="form-control @error('segundoNom') is-invalid @enderror" name="segundoNom" id="segundoNom" value="{{ $empleado->sNom}}">
                            @error('segundoNom')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="primerApe">@lang('Primer Apellido')</label>
                            <input type="text"  class="form-control @error('primerApe') is-invalid @enderror" name="primerApe" id="primerApe" value="{{ $empleado->pApe}}">
                            @error('primerApe')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="segundoApe">@lang('Segundo Apellido')</label>
                            <input type="text"  class="form-control @error('segundoApe') is-invalid @enderror" name="segundoApe" id="segundoApe" value="{{ $empleado->sApe}}">
                            @error('segundoApe')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="tipoId">@lang('Tipo Identificación')</label>
                            <select name="tipoId" class="form-control @error('tipoId') is-invalid @enderror" name="tipoId" id="tipoId">                            
                                @foreach ($tiposId as $tipoId)
                                    <option value="{{$tipoId->tipoId}}" 
                                        @if ($tipoId->tipoId == $empleado->tipoId)    
                                        selected>{{$tipoId->nomTipo}}</option>                                                                           
                                    @else
                                    >{{$tipoId->nomTipo}}</option>
                                    @endif
                                @endforeach                                                 
                            </select>
                            @error('ips')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror                                                       
                        </div>
                    </div>                    
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="numeroId">@lang('Número Identificación')</label>
                            <input type="text"  class="form-control @error('numeroId') is-invalid @enderror" name="numeroId" id="numeroId" value="{{ $empleado->nIdEmp}}">
                            @error('numeroId')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="fechaNac">@lang('Fecha Nacimiento')</label>
                            <input type="date"  class="form-control @error('fechaNac') is-invalid @enderror" name="fechaNac" id="fechaNac" value="{{ $empleado->fecNac}}">
                            @error('fechaNac')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="genero">@lang('Género')</label>
                            <select name="genero" class="form-control @error('genero') is-invalid @enderror" name="genero" id="tipoId">
                                @if($empleado->genero == "M")
                                    <option value="{{$empleado->genero}}" selected>Masculino</option>                                                                                                               
                                    <option value="F">Femenino</option>
                                @else
                                <option value="{{$empleado->genero}}" selected>Femenino</option>                                                                                                               
                                <option value="M">Masculino</option>
                                @endif                                                                                                                         
                            </select>                                                                                     
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-3">
                        <label for="rh">RH</label>
                        <div class="form-group form-inline">                            
                            <select name="rh" id="rh" class="form-control">
                                <option value="{{ $empleado->rh[0] }}" selected>{{ $empleado->rh[0] }}</option>
                                <option value="B">B</option>
                                <option value="O">O</option>
                                <option value="AB">AB</option>
                            </select>
                            <select name="rhS" id="rhS" class="form-control">
                                <option value="{{ $empleado->rh[1] }}" selected>{{ $empleado->rh[1] }}</option>
                                @if ($empleado->rh[1] == "+")
                                    <option value="-">-</option>
                                @else
                                    <option value="+">+</option>                       
                                @endif
                            </select>
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="estadoCivil">@lang('Estado Civíl')</label>
                            <select name="estadoCivil" class="form-control @error('estadoCivil') is-invalid @enderror" name="estadoCivil" id="estadoCivil">
                                <option value="{{$empleado->eCivil}}">{{$empleado->eCivil}}</option>
                                <option value="Soltero">Soltero</option>
                                <option value="Casado">Casado</option>                            
                                <option value="Unión Libre">Unión Libre</option>                            
                            </select>
                            @error('estadoCivil')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror                                                       
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="nivelEdu">@lang('NIvel Educativo')</label>
                            <select name="nivelEdu" class="form-control @error('nivelEdu') is-invalid @enderror" name="nivelEdu" id="nivelEdu">
                                <option value="{{$empleado->nivlEdu}}">{{$empleado->nivlEdu}}</option>
                                <option value="Técnico">Técnico</option>
                                <option value="Técnico Pro.">Técnico Profesional</option>                            
                                <option value="Tecnólogo">Tecnólogo</option> 
                                <option value="Profesional">Profesional</option>                            
                                <option value="Profesional Esp.">Profesional Especializado</option>                            
                            </select>
                            @error('nivelEdu')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror                                                       
                        </div>
                    </div>                    
                    {{-- Datos de Contacto --}}                  
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item font-weight-bold" aria-current="page">@lang('Datos Contacto')</li>
                            </ol>
                          </nav>
                    </div>   
                    
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="ciudad">@lang('Ciudad')</label>
                            <input type="text"  class="form-control @error('ciudad') is-invalid @enderror" name="ciudad" id="ciudad" value="{{ $empleado->ciuRes}}">
                            @error('ciudad')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="direccion">@lang('Dirección')</label>
                            <input type="text"  class="form-control @error('ciudirecciondad') is-invalid @enderror" name="direccion" id="direccion" value="{{ $empleado->dirRes}}">
                            @error('direccion')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="telefono">@lang('Teléfono')</label>
                            <input type="text"  class="form-control @error('telefono') is-invalid @enderror" name="telefono" id="telefono" value="{{ $empleado->telEmp}}">
                            @error('telefono')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="email">@lang('Correo')</label>
                            <input type="email"  class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $empleado->emailEmp}}">
                            @error('email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div> 

                    {{-- Datos de EPS --}}                  
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item font-weight-bold" aria-current="page">@lang('Datos EPS')</li>
                            </ol>
                          </nav>
                    </div>   
                    
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="arl">ARL</label>
                            <select name="arl" class="form-control @error('arl') is-invalid @enderror" id="arl">
                                <option value="{{$empleado->arl}}" selected>{{$empleado->arl}}</option>
                                <option value="Sura">ARP SURA</option>  
                                <option value="Bolivar">CIA DE SEGUROS BOLIVAR SA</option> 
                                <option value="Aurora">COMPAÑIA DE SEGUROS DE VIDA AURORA</option> 
                                <option value="Equidad">LA EQUIDAD SEGUROS DE VIDA ORGANISMO COOPERATIVO LA EQUIDAD VIDA</option>
                                <option value="Liberty">LIBERTY SEGUROS DE VIDA</option> 
                                <option value="Mapfre">MAPFRE COLOMBIA VIDA SEGUROS SA</option>
                                <option value="Positiva">POSITIVA COMPAÑIA DE SEGURO</option>  
                                <option value="Colmena">RIESGOS PROFESIONALES COLMENA SA COMPAÑIA DE SEGUROS DE VIDA</option>  
                                <option value="Alfa">SEGUROS DE VIDA ALFA SA</option>                                                                             
                                <option value="Colpatría">SEGUROS DE VIDA COLPATRIA SA</option>                                                                                                                                                                                                                                                                                                         
                            </select>
                            @error('arl')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror                                                       
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="eps">@lang('Nombre IPS')</label>
                            <select name="eps" class="form-control @error('eps') is-invalid @enderror" name="eps" id="eps">                            
                                @foreach ($convenios as $convenio)
                                    <option value="{{$convenio->nomIPS}}" 
                                        @if ($convenio->nomIPS == $empleado->eps)    
                                        selected>{{$convenio->nomIPS}}</option>                                                                           
                                    @else
                                    >{{$convenio->nomIPS}}</option>
                                    @endif
                                @endforeach                                                 
                            </select>
                            @error('ips')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror                                                       
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="sede">@lang('Sede')</label>
                            <select name="sede" class="form-control @error('sede') is-invalid @enderror" name="sede" id="sede">
                                @foreach ($sedes as $sede)
                                    <option value="{{$sede->nomSede}}" 
                                        @if ($sede->nomSede == $empleado->nomSede)    
                                        selected>{{$sede->nomSede}}</option>                                                                           
                                    @else
                                    >{{$sede->nomSede}}</option>
                                    @endif
                                @endforeach                                                                                          
                            </select>
                            @error('sede')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror                                                       
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="estado">@lang('Estado')</label>
                            <select class="form-control @error('estado') is-invalid @enderror" name="estado" id="estado" value="Activo" aria-describedby="helpEstado">
                                @if($empleado->estado == 1)
                                    <option selected value="{{ $empleado->estado}}">Activo</option>
                                    <option value="0">Inactivo</option>
                                @else
                                <option selected value="{{$empleado->estado}}">Inactivo</option>
                                <option value="1">Activo</option>
                                @endif
                            </select>                                                                              
                            @error('estado')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- Datos de Empresa --}}                  
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item font-weight-bold" aria-current="page">@lang('Datos Empresa')</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="fechaIng">@lang('Fecha Ingreso')</label>
                            <input type="date"  class="form-control @error('fechaIng') is-invalid @enderror" name="fechaIng" id="fechaIng" value="{{ $empleado->fecIng}}">
                            <small>@lang('Esta es la fecha en la que ingresó a la empresa.')</small>
                            @error('fechaIng')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>                    
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="cargo">@lang('Cargo')</label>
                            <select name="cargo" class="form-control @error('rol') is-invalid @enderror" name="cargo" id="cargo">
                                @foreach ($cargos as $cargo)
                                    <option value="{{$cargo->nomCar}}" 
                                        @if ($cargo->nomCar == $empleado->nomCar)    
                                        selected>{{$cargo->nomCar}}</option>                                                                           
                                    @else
                                    >{{$cargo->nomCar}}</option>
                                    @endif
                                @endforeach                                                                                          
                            </select>
                            @error('rol')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror                                                       
                        </div>
                    </div> 
                </div> 
                <div class="col-12">
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> @lang('Actualizar')</button>               
                </div>                
            </form>
        </div>
    </div>
@endsection