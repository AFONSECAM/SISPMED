@extends('layouts.app')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <a href="/inventario">
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
            <strong>@lang('Editar Categoría')</strong>
        </div>
        <div class="card-body">
            @include('flash::message')
            <form action="/inventario/categorias/actualizar" method="POST">
                <input type="hidden" name="id" id="id" value="{{$categoria->id}}">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="">@lang('Nombre')</label>
                            <input type="text"  class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="" value="{{$categoria->nomCate}}">
                            @error('nombre')
                                <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                    </div>                    
                </div>
                <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> @lang('Guardar')</button>
            </form>            
        </div>
    </div>
@endsection