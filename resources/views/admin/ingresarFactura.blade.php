@extends('adminlte::page')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 mt-4">
                <div class="card" style="text-align: center">
                    <div style="text-align: center">
                        <h1>INGRESAR PPL</h1>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

                <div class="card">
                    <div class="card-body">
                        <div class="col-auto">
                            <form action="{{ route('admin.ingresarDatosFactura') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="col-sm-3" style="float: left">
                                        <label for="">N° Factura :</label>
                                        <input type="text" name="numeroFactura" id="numeroFactura" class="form-control" placeholder="Ingrese N° de Factura"  required>
                                        @if(Session::has('message'))
                                            <p style="color: red">{!! Session::get('message') !!}</p>
                                        @endif
                                    </div>
                                    <div class="col-sm-3" style="float: left">
                                        <label for="">N° Guia</label>
                                        <input type="text" name="guia" id="guia" class="form-control" placeholder="Ingrese N° de Guia"  required>
                                        @if(Session::has('message'))
                                            <p style="color: red">{!! Session::get('message') !!}</p>
                                        @endif
                                    </div>
                                    <div class="col-sm-3" style="float: left">
                                        <label for="">Producto:</label>
                                        {{ Form::select('producto', $producto ,null, ['class' => 'form-control' . ($errors->has('producto') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el Producto']) }}
                                        {!! $errors->first('Producto', '<div class="invalid-feedback">:message</p>') !!}
                                    </div>
                                    <div class="col-sm-3" style="float: left">
                                        <label for="">Modelo:</label>
                                        <input type="text" name="modelo" id="modelo" class="form-control" placeholder="Ingrese el Modelo" required>
                                        @if(Session::has('message'))
                                            <p style="color: red">{!! Session::get('message') !!}</p>
                                        @endif
                                    </div>
                                </div>  
                                <div class="card-body">
                                    <div class="col-sm-4" style="text-align: center; float: left;">
                                        <label for="formFile">Lote</label>
                                        <input class="form-control" type="number" id="lote" name="lote" placeholder="Ingrese el Lote">
                                    </div> 
                                    <div class="col-sm-4" style="text-align: center; float: left; ">
                                        <label for="formFile">Seleccione el Packing List</label>
                                        <input class="form-control" type="file" id="file" name="file">
                                    </div> 
                                    <div class="col-sm-4 mt-4" style="text-align: center; float: left;">
                                        <input type="submit" value="Guardar y Enviar" class="btn btn-sm btn-primary ">
                                    </div>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
@endsection


@section('footer')
    <div style="text-align:center"> <h6>@Copyright KmgFueguina</h5></div>
@endsection

@section('js')
<script>
        var myCollapsible = document.getElementById('myCollapsible')
        myCollapsible.addEventListener('hidden.bs.collapse', function () {
        // do something...
        })
</script>
@endsection



    
