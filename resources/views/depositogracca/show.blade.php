@extends('layouts.app')

@section('template_title')
    {{ $depositogracca->name ?? 'Show Depositogracca' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Depositogracca</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('depositogracca.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Guia:</strong>
                            {{ $depositogracca->guia }}
                        </div>
                        <div class="form-group">
                            <strong>Numerofactura:</strong>
                            {{ $depositogracca->numeroFactura }}
                        </div>
                        <div class="form-group">
                            <strong>Producto:</strong>
                            {{ $depositogracca->producto }}
                        </div>
                        <div class="form-group">
                            <strong>Modelo:</strong>
                            {{ $depositogracca->modelo }}
                        </div>
                        <div class="form-group">
                            <strong>Partcode:</strong>
                            {{ $depositogracca->partCode }}
                        </div>
                        <div class="form-group">
                            <strong>Codigoalternativo:</strong>
                            {{ $depositogracca->codigoAlternativo }}
                        </div>
                        <div class="form-group">
                            <strong>Partname:</strong>
                            {{ $depositogracca->partName }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $depositogracca->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $depositogracca->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Origen:</strong>
                            {{ $depositogracca->origen }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
