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
                        <h1>Ingreso de Facturas</h1>
                    </div>
                </div>
         
                <div class="card-body">
                    
                    <form action="{{ route('admin.ingresarDatosFactura') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-6" style="float: left">
                            <label for="">N° Factura :</label>
                            <input type="text" name="numeroFactura" id="numeroFactura" class="form-control" placeholder="Ingrese N° de Factura"  required>
                            @if(Session::has('message'))
                                <p style="color: red">{!! Session::get('message') !!}</p>
                            @endif
                        </div>
                        <div class="col-sm-6" style="float: left">
                            <label for="">N° Guia</label>
                            <input type="text" name="guia" id="guia" class="form-control" placeholder="Ingrese N° de Guia"  required>
                            @if(Session::has('message'))
                                <p style="color: red">{!! Session::get('message') !!}</p>
                            @endif
                        </div>
                    
                        <div class="col-sm-6 mt-4" style="float: left">
                            <label for="">Producto:</label>
                            <input type="text" name="producto" id="producto" class="form-control" placeholder="Ingrese el Producto"  required>
                            @if(Session::has('message'))
                                <p style="color: red">{!! Session::get('message') !!}</p>
                            @endif
                        </div>
                        <div class="col-sm-6 mt-4" style="float: left">
                            <label for="">Modelo:</label>
                            <input type="text" name="modelo" id="modelo" class="form-control" placeholder="Ingrese el Modelo" required>
                            @if(Session::has('message'))
                                <p style="color: red">{!! Session::get('message') !!}</p>
                            @endif
                        </div>
                    </form>
                    
                </div>
            </div> 
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.ingresarDatosFactura') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-6" style="float: left">
                            <label for="">Part Number:</label>
                            <input type="text" name="numeroFactura" id="numeroFactura" class="form-control" placeholder="Ingrese N° de Factura"  required>
                            @if(Session::has('message'))
                                <p style="color: red">{!! Session::get('message') !!}</p>
                            @endif
                        </div>
                        <div class="col-sm-6" style="float: left">
                            <label for="">Cantidad:</label>
                            <input type="number" name="guia" id="guia" class="form-control" placeholder="Ingrese N° de Guia"  required>
                            @if(Session::has('message'))
                                <p style="color: red">{!! Session::get('message') !!}</p>
                            @endif
                        </div>
                        <div class="col-sm-12 mt-4" style="text-align: center">
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
                                <th>PartCode</th>
                                <th>Cantidad</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($depositograccas as $depositogracca) --}}
                                <tr>
                                    {{-- <td>{{ $depositogracca->id }}</td>
                                    <td>{{ $depositogracca->guia }}</td>
                                    <td>{{ $depositogracca->numeroFactura }}</td>
                                    <td>{{ $depositogracca->producto }}</td>
                                    <td>{{ $depositogracca->modelo }}</td> --}}
                                    <td>
                                        
                                        {{-- <a href="{{ route('depositogracca.agregar') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                            {{ __('Agregar Detalle') }}
                                        </a> --}}
                                        {{-- <form action="{{ route('depositogracca.destroy',$depositogracca->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('depositogracca.factura',$depositogracca->id) }}"><i class="fa fa-fw fa-eye"></i> Agregar</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('depositogracca.edit',$depositogracca->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                        </form> --}}
                                    </td>
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
