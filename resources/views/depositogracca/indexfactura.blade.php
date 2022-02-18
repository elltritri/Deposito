@extends('adminlte::page')

@section('template_title')
    Depositogracca
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 mt-4">
            <div class="card" style="text-align: center">
                <div>
                    <div style="text-align: center">
                        <h1>INGRESO DE MATERIAL</h1>
                    </div>
                </div>
            </div>
            <div class="card" style="text-align: center">
                <div class="card-body">
                    <div class="col-sm-3" style="float: left">
                        <label for="">N° Factura :</label>
                        <input type="text" name="numeroFactura" id="numeroFactura" value="{{ $factura }}" class="form-control"  disabled required>
                            @if(Session::has('message'))
                                <p style="color: red">{!! Session::get('message') !!}</p>
                            @endif
                        </div>
                    <div class="col-sm-3" style="float: left">
                        <label for="">N° Guia</label>
                        <input type="text" name="guia" id="guia" value="{{ $guia }}" class="form-control"  disabled required>
                            @if(Session::has('message'))
                                <p style="color: red">{!! Session::get('message') !!}</p>
                            @endif
                        </div>
                    <div class="col-sm-3" style="float: left">
                        <label for="">Producto:</label>
                        <input type="text" name="producto" id="producto" value="{{ $producto }}" class="form-control" disabled  required>
                            @if(Session::has('message'))
                                <p style="color: red">{!! Session::get('message') !!}</p>
                            @endif
                    </div>
                    <div class="col-sm-3" style="float: left">
                        <label for="">Modelo:</label>
                            <input type="text" name="modelo" id="modelo" value="{{ $modelo }}"  class="form-control" disabled required>
                            @if(Session::has('message'))
                                <p style="color: red">{!! Session::get('message') !!}</p>
                            @endif
                    </div>
                </div>
            </div> 
            <div class="card">
                <div class="card-body" >
                    <form action="{{ route('admin.ingresarDatosFactura') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-4 "  style="float: left">
                            <label for="">Cantidad:</label>
                            <input type="number" name="guia" id="guia" class="form-control" placeholder="Ingrese la Cantidad"  required>
                            @if(Session::has('message'))
                                <p style="color: red">{!! Session::get('message') !!}</p>
                            @endif
                        </div>
                        <div class="col-sm-4 " style="float: left">
                            <label for="">Part Number:</label>
                            <input type="text" name="numeroFactura" id="numeroFactura" class="form-control" placeholder="Ingrese PartNumber"  required>
                            @if(Session::has('message'))
                                <p style="color: red">{!! Session::get('message') !!}</p>
                            @endif
                        </div>
                        <br>
                        <div class="col-sm-4 " style="float:left;text-align: center">
                            <input type="submit" value="Guardar y Enviar" class="btn btn-sm btn-primary ">
                        </div>  
                    </form>
                </div>
            </div> 
            <div class="card">
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th>Cantidad</th>
                                <th>PartCode</th>
                            </tr>
                        </thead>
                        <tbody>
                                    {{-- @foreach ($factura as $depositogracca) --}}
                                        <tr>
                                            {{-- <td>{{ $depositogracca->id }}</td>
											<td>{{ $depositogracca->guia }}</td>
											<td>{{ $depositogracca->numeroFactura }}</td>
											<td>{{ $depositogracca->producto }}</td>
											<td>{{ $depositogracca->modelo }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary " href="{{ route('depositogracca.agregar',$depositogracca->id) }}"><i class="fa fa-fw fa-eye"></i> Agregar</a>
                                            </td> --}}
                                        </tr>
                                    {{-- @endforeach --}}
                                </tbody>
                    </table>
                </div>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
