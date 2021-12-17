@extends('layouts.app')

@section('template_title')
    {{ $bom->name ?? 'Show Bom' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Bom</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('boms.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Partcode:</strong>
                            {{ $bom->partCode }}
                        </div>
                        <div class="form-group">
                            <strong>Codigoalternativo:</strong>
                            {{ $bom->codigoAlternativo }}
                        </div>
                        <div class="form-group">
                            <strong>Partname:</strong>
                            {{ $bom->partName }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $bom->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $bom->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Origen:</strong>
                            {{ $bom->origen }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
