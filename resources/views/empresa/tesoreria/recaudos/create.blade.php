@extends('layouts.app');
@section('contenido')
    <div class="row">
        <div class="col-12">
            <a href="/empresa/tesoreria/recaudos">
                <button type="button" class="btn btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')}}"></use>                    
                    </svg>
                    Regresar
                </button>
            </a> 
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-header">
            <strong>Registrar Recaudo</strong>
        </div>
        @include('flash::message')
        <div class="card-body">            
            <form action="/empresa/tesoreria/recaudos/guardar" method="POST">                
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="codigoReca">Código</label>
                            <input id="codigoReca" type="text" class="form-control @error('codigoReca') is-invalid @enderror" name="codigoReca" >
                            @error('codigoReca')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="fechaReca">Fecha Recaudo</label>
                            <input id="fechaReca" type="date" name="fechaReca" class="form-control @error('fechaReca') is-invalid @enderror">
                            @error('fechaReca')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="conceptoReca">Concepto(de qué se recibió)</label>
                            <textarea id="conceptoReca" name="conceptoReca" class="form-control @error('conceptoReca') is-invalid @enderror" cols="30" rows="10"></textarea>                            
                            @error('conceptoReca')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="valorReca">Valor recibido</label>
                            <input id="valorReca" type="text" class="form-control @error('valorReca') is-invalid @enderror" name="valorReca">
                            @error('valorReca')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-right">Guardar</button>
            </form>
        </div>
    </div>
@endsection