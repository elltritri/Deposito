@extends('layouts.app')

@section('template_title')
    {{ $listaproducto->name ?? 'Show Listaproducto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Listaproducto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('listaproductos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Numerofactura:</strong>
                            {{ $listaproducto->numeroFactura }}
                        </div>
                        <div class="form-group">
                            <strong>Producto:</strong>
                            {{ $listaproducto->producto }}
                        </div>
                        <div class="form-group">
                            <strong>Modelo:</strong>
                            {{ $listaproducto->modelo }}
                        </div>
                        <div class="form-group">
                            <strong>Partcode:</strong>
                            {{ $listaproducto->partCode }}
                        </div>
                        <div class="form-group">
                            <strong>Codigoalternativo:</strong>
                            {{ $listaproducto->codigoAlternativo }}
                        </div>
                        <div class="form-group">
                            <strong>Partname:</strong>
                            {{ $listaproducto->partName }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $listaproducto->cantidad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
