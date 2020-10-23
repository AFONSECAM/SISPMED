@extends('layouts.app')
@section('contenido')
<div class="row">
    <div class="col-12">
        <a href="/empresa/convenios">
            <button type="button" class="btn btn-sm btn-info text-white float-left">
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
            <strong>@lang('Editar Convenio')</strong>
        </div>
        <div class="card-body">
            @include('flash::message')
            <form action="/empresa/convenios/actualizar" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$convenio->id}}" />
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="">@lang('Código')</label>
                        <input type="text"  class="form-control @error('codigoConv') is-invalid @enderror" name="codigoConv" value="{{$convenio->codConv}}">
                        @error('nombreSede')
                            <div class="invalid-feedback"></div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="">@lang('Fecha Apertura')</label>
                        <input type="date" readonly class="form-control" name="fechaConv" value="{{$convenio->fecAper}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="">IPS</label>
                        <input type="text"  class="form-control @error('nombreIPS') is-invalid @enderror" name="nombreIPS" value="{{$convenio->nomIPS}}">
                        @error('nombreIPS')
                            <div class="invalid-feedback"></div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="">@lang('Nombre')</label>
                        <input type="text"  class="form-control @error('nombreConv') is-invalid @enderror" name="nombreConv" value="{{$convenio->nomConv}}">
                        @error('nombreConv')
                            <div class="invalid-feedback"></div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="">@lang('Resolución')</label>
                        <input type="text"  class="form-control @error('resolucion') is-invalid @enderror" name="resolucion" value="{{$convenio->resolu}}">
                        @error('resolucion')
                            <div class="invalid-feedback"></div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="">@lang('Objeto')</label>
                        <textarea name="objetoConv" class="form-control" cols="20" rows="5" placeholder="{{$convenio->objConv}}"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="">@lang('Duración (meses)')</label>
                        <input type="number" class="form-control @error('duracion') is-invalid @enderror" name="duracion" value="{{$convenio->durConv}}">
                        @error('duracion')
                            <div class="invalid-feedback"></div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="">@lang('Costo')</label>
                        <input type="number"  class="form-control @error('costo') is-invalid @enderror" name="costo" value="{{$convenio->cosConv}}">
                        @error('costo')
                            <div class="invalid-feedback"></div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="">@lang('Estado')</label>
                        <select name="estado" class="form-control">
                        @if ($convenio->estado == 1)
                            <option selected value="{{$convenio->estado}}">Activo</option>    
                            <option value="0">Inactivo</option>
                        @else
                            <option value="1">Activo</option>    
                            <option selected value="{{$convenio->estado}}">Inactivo</option>                                                           
                        @endif                            
                        </select>                            
                    </div>
                </div>
            </div>
                <button type="submit" class="btn btn-warning float-right"><b>@lang('Actualizar')</b></button>
            </form>            
        </div>
    </div>
@endsection