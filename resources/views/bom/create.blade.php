@extends('adminlte::page')

@section('template_title')
    Create Bom
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Bom</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('bom.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('bom.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
