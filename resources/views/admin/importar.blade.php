@extends('adminlte::page')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 mt-4">
                <div class="card" style="text-align: center">
                    <div>
                        <form action="{{ route('admin.importarDatos') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if (Session::has('message'))
                                <p>{{ Session::get('message') }}</p>
                            @endif
                            
                            <div class="card-body">
                                <div class="col-sm-6" style="float: left">
                                    <label for="">Ingrese N° Factura (Invoice)</label>
                                    {!! Form::select('bom', $bom, null, ['class' => 'form-control' ]) !!}
                                    @if(Session::has('message'))
                                        <p style="color: red">{!! Session::get('message') !!}</p>
                                    @endif
                                </div>
                                <div class="col-sm-6" style="float: left">
                                    <label for="">Ingrese N° Guia</label>
                                    <input type="text" name="numeroFactura" id="numeroFactura" class="form-control"  required>
                                    @if(Session::has('message'))
                                        <p style="color: red">{!! Session::get('message') !!}</p>
                                    @endif
                                </div>
                                <div class="col-sm-6" style="float: left">
                                    <label for="">Ingrese ParCode</label>
                                    <input type="text" name="numeroFactura" id="numeroFactura" class="form-control"  required>
                                    @if(Session::has('message'))
                                        <p style="color: red">{!! Session::get('message') !!}</p>
                                    @endif
                                </div>
                                <div class="col-sm-6" style="float: left">
                                    <label for="">Cantidad</label>
                                    <input type="text" name="numeroFactura" id="numeroFactura" class="form-control"  required>
                                    @if(Session::has('message'))
                                        <p style="color: red">{!! Session::get('message') !!}</p>
                                    @endif
                                </div>
                            </div>
                            <input type="submit" value="Agregar">
                        </form>
                    </div>
                </div>    
            </div>
        </div>
    </div>
@endsection


@section('footer')
    <div style="text-align:center"> <h6>@copyryght KmgFueguina</h5></div>
@endsection