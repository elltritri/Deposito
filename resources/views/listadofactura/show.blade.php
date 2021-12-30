@extends('layouts.app')

@section('template_title')
    {{ $listadofactura->name ?? 'Show Listadofactura' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Listadofactura</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('listadofacturas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Guia:</strong>
                            {{ $listadofactura->guia }}
                        </div>
                        <div class="form-group">
                            <strong>Numerofactura:</strong>
                            {{ $listadofactura->numeroFactura }}
                        </div>
                        <div class="form-group">
                            <strong>Producto:</strong>
                            {{ $listadofactura->producto }}
                        </div>
                        <div class="form-group">
                            <strong>Modelo:</strong>
                            {{ $listadofactura->modelo }}
                        </div>
                        <div class="form-group">
                            <strong>Partcode:</strong>
                            {{ $listadofactura->partCode }}
                        </div>
                        <div class="form-group">
                            <strong>Codigoalternativo:</strong>
                            {{ $listadofactura->codigoAlternativo }}
                        </div>
                        <div class="form-group">
                            <strong>Partname:</strong>
                            {{ $listadofactura->partName }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $listadofactura->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $listadofactura->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Origen:</strong>
                            {{ $listadofactura->origen }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
