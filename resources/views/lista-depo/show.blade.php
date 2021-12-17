@extends('layouts.app')

@section('template_title')
    {{ $listaDepo->name ?? 'Show Lista Depo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Lista Depo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('lista-depos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Numerofactura:</strong>
                            {{ $listaDepo->numeroFactura }}
                        </div>
                        <div class="form-group">
                            <strong>Producto:</strong>
                            {{ $listaDepo->producto }}
                        </div>
                        <div class="form-group">
                            <strong>Modelo:</strong>
                            {{ $listaDepo->modelo }}
                        </div>
                        <div class="form-group">
                            <strong>Partcode:</strong>
                            {{ $listaDepo->partCode }}
                        </div>
                        <div class="form-group">
                            <strong>Codigoalternativo:</strong>
                            {{ $listaDepo->codigoAlternativo }}
                        </div>
                        <div class="form-group">
                            <strong>Partname:</strong>
                            {{ $listaDepo->partName }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $listaDepo->cantidad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
