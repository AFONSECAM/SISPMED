@extends('layouts.app');
@section('contenido')
    <div class="row">
        <div class="col-12">
            <a href="/empresa/tesoreria/gastos">
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
            <strong>Registrar Gasto</strong>
        </div>
        @include('flash::message')
        <div class="card-body">            
            <form action="/empresa/tesoreria/gastos/guardar" method="POST">                
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="codigoGas">Código</label>
                        <input id="codigoGas" type="text" readonly class="form-control @error('codigoGas') is-invalid @enderror" name="codigoGas" value="{{$ultimoGasto->id+1}}" >
                            @error('codigoGas')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="fechaGas">Fecha Gasto</label>
                            <input id="fechaGas" type="date" name="fechaGas" class="form-control @error('fechaGas') is-invalid @enderror">
                            @error('fechaGas')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="formaPago">Medio Pago</label>
                            <select name="formaPago" id="formaPago" class="form-control @error('formaPago') is-invalid @enderror">
                                <option>Seleccione medio de pago</option>
                                <option value="Efectivo">Efectivo</option>
                                <option value="Tarjeta">Tarjeta Debito/Crédito</option>
                                <option value="Cheque">Cheque</option>
                            </select>                            
                            @error('formaPago')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="conceptoGas">Concepto (de qué se recibió)</label>
                            <textarea id="conceptoGas" name="conceptoGas" class="form-control @error('conceptoGas') is-invalid @enderror" cols="30" rows="10"></textarea>                            
                            @error('conceptoGas')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="valorGas">Valor recibido</label>
                            <input id="valorGas" type="text" class="form-control @error('valorGas') is-invalid @enderror" name="valorGas">
                            @error('valorGas')
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