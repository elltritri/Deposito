@extends('adminlte::page')
@section('template_title')
    Create Lista Depo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Lista Depo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('lista-depo.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('lista-depo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
