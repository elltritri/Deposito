@extends('layouts.app')

@section('template_title')
    {{ $factura->name ?? 'Show Factura' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Factura</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('facturas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Guia:</strong>
                            {{ $factura->guia }}
                        </div>
                        <div class="form-group">
                            <strong>Numerofactura:</strong>
                            {{ $factura->numeroFactura }}
                        </div>
                        <div class="form-group">
                            <strong>Producto:</strong>
                            {{ $factura->producto }}
                        </div>
                        <div class="form-group">
                            <strong>Modelo:</strong>
                            {{ $factura->modelo }}
                        </div>
                        <div class="form-group">
                            <strong>Lote:</strong>
                            {{ $factura->lote }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
