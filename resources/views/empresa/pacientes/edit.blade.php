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
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-header">
            <strong>@lang('Editar Paciente')</strong>
        </div>
        <div class="card-body">
            @include('flash::message')
            <form action="/pacientes/actualizar" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$paciente->id}}"/>
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
                        <input type="text"  class="form-control @error('primerNom') is-invalid @enderror" name="primerNom" id="primerNom" value="{{ $paciente->pNom}}">
                            @error('primerNom')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="segundoNom">@lang('Segundo Nombre')</label>
                            <input type="text"  class="form-control @error('segundoNom') is-invalid @enderror" name="segundoNom" id="segundoNom" value="{{ $paciente->sNom}}">
                            @error('segundoNom')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="primerApe">@lang('Primer Apellido')</label>
                            <input type="text"  class="form-control @error('primerApe') is-invalid @enderror" name="primerApe" id="primerApe" value="{{ $paciente->pApe}}">
                            @error('primerApe')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="segundoApe">@lang('Segundo Apellido')</label>
                            <input type="text"  class="form-control @error('segundoApe') is-invalid @enderror" name="segundoApe" id="segundoApe" value="{{ $paciente->sApe}}">
                            @error('segundoApe')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="tipoId">@lang('Tipo Identificación')</label>
                            <select name="tipoId" class="form-control @error('tipoId') is-invalid @enderror" name="tipoId" id="tipoId">
                                @foreach ($tiposId as $tipo)
                                    <option value="{{$tipo->tipoId}}" 
                                        @if ($tipo->tipoId == $paciente->tipoId)    
                                        selected>{{$tipo->tipoId}}</option>                                                                           
                                    @else
                                    >{{$tipo->tipoId}}</option>
                                    @endif
                                @endforeach                                                                                          
                            </select>
                            @error('tipoId')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror                                                       
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="numeroId">@lang('Número Identificación')</label>
                            <input type="text"  class="form-control @error('numeroId') is-invalid @enderror" name="numeroId" id="numeroId" value="{{ $paciente->nIdPac}}">
                            @error('numeroId')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="fechaNac">@lang('Fecha Nacimiento')</label>
                            <input type="date"  class="form-control @error('fechaNac') is-invalid @enderror" name="fechaNac" id="fechaNac" value="{{ $paciente->fNaci}}">
                            @error('fechaNac')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">  
                        <div class="form-group">
                            <label for="edad">@lang('Edad')</label>
                            <input type="number"  class="form-control @error('edad') is-invalid @enderror" name="edad" id="edad" value="{{ $paciente->edad}}">
                            @error('edad')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="genero">@lang('Género')</label>
                            <select name="genero" class="form-control @error('genero') is-invalid @enderror" name="genero" id="tipoId">
                                @if($paciente->genero == "M")
                                    <option value="{{$paciente->genero}}" selected>Masculino</option>                                                                                                               
                                    <option value="F">Femenino</option>
                                @else
                                <option value="{{$paciente->genero}}" selected>Femenino</option>                                                                                                               
                                <option value="M">Masculino</option>
                                @endif                                                                                                                         
                            </select>                                                                                     
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="rh">RH</label>
                            <input type="text"  class="form-control @error('rh') is-invalid @enderror" name="rh" id="rh" value="{{ $paciente->rh}}">
                            @error('rh')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="estadoCivil">@lang('Estado Civíl')</label>
                            <select name="estadoCivil" class="form-control @error('estadoCivil') is-invalid @enderror" name="estadoCivil" id="estadoCivil">
                                <option value="{{$paciente->eCivil}}">{{$paciente->eCivil}}</option>                          
                            </select>
                            @error('estadoCivil')
                                <div class="invalid-feedback"></div>
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
                            <input type="text"  class="form-control @error('ciudad') is-invalid @enderror" name="ciudad" id="ciudad" value="{{ $paciente->ciudad}}">
                            @error('ciudad')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="direccion">@lang('Dirección')</label>
                            <input type="text"  class="form-control @error('ciudirecciondad') is-invalid @enderror" name="direccion" id="direccion" value="{{ $paciente->dirResi}}">
                            @error('direccion')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="telefono">@lang('Teléfono')</label>
                            <input type="text"  class="form-control @error('telefono') is-invalid @enderror" name="telefono" id="telefono" value="{{ $paciente->telPac}}">
                            @error('telefono')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="email">@lang('Correo')</label>
                            <input type="email"  class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $paciente->emailPac}}">
                            @error('email')
                                <div class="invalid-feedback"></div>
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
                            <label for="regimen">@lang('Régimen')</label>
                            <select name="regimen" class="form-control @error('regimen') is-invalid @enderror" id="regimen">
                                <option value="">{{$paciente->regimen}}</option>
                                <option value="Contributivo">Contributivo</option>
                                <option value="Subsidiado">Subsidiado</option>                                                                                     
                            </select>
                            @error('regimen')
                                <div class="invalid-feedback"></div>
                            @enderror                                                       
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="eps">IPS</label>
                            <select name="eps" class="form-control @error('eps') is-invalid @enderror" name="eps" id="eps">                            
                                @foreach ($convenios as $convenio)
                                    <option value="{{$convenio->nomIPS}}" 
                                        @if ($convenio->nomIPS == $paciente->eps)    
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
                                        @if ($sede->nomSede == $paciente->nomSede)    
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
                            <select class="form-control @error('estado') is-invalid @enderror" name="estado" id="estado" aria-describedby="helpEstado">
                                @if($paciente->estado == "Activo")
                                    <option selected value="{{ $paciente->estado}}">Activo</option>
                                    <option value="0">Inactivo</option>
                                @else
                                <option selected value="{{$paciente->estado}}">Inactivo</option>
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
                </div> 
                <div class="col-12">
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> @lang('Guardar')</button>               
                </div>                
            </form>
        </div>
    </div>
@endsection