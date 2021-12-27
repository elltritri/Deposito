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
                                    {!! Form::select('numeroFactura', $bom, null, ['class' => 'form-control' ]) !!}
                                    @if(Session::has('message'))
                                        <p style="color: red">{!! Session::get('message') !!}</p>
                                    @endif
                                </div>
                                <div class="col-sm-6" style="float: left">
                                    <label for="">Ingrese N° Guia</label>
                                    <input type="text" name="guia" id="guia" class="form-control"  required>
                                    @if(Session::has('message'))
                                        <p style="color: red">{!! Session::get('message') !!}</p>
                                    @endif
                                </div>
                                <div class="col-sm-6" style="float: left">
                                    <label for="">Ingrese ParCode</label>
                                    <input type="text" name="partCode" id="partCode" class="form-control"  required>
                                    @if(Session::has('message'))
                                        <p style="color: red">{!! Session::get('message') !!}</p>
                                    @endif
                                </div>
                                <div class="col-sm-6" style="float: left">
                                    <label for="">Cantidad</label>
                                    <input type="text" name="cantidad" id="cantidad" class="form-control"  required>
                                    @if(Session::has('message'))
                                        <p style="color: red">{!! Session::get('message') !!}</p>
                                    @endif
                                </div>
                            </div>
                            <input type="submit" value="Agregar">
                        </form>
                    </div>
                </div>  
                <div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tabla2" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>N° Factura</th>
                                        <th>Par Code</th>
                                        <th>Codigo</th> 
                                        <th>Part Name</th>
                                        <th>Descripcion</th>
                                        <th>Cantidad</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($listaDepo as $fil)
                                        <tr>
                                            <td>{{ $fil->numeroFactura }}</td>
                                            <td>{{ $fil->partCode }}</td>
                                            <td>{{ $fil->codigoAlternativo }}</td>
                                            <td>{{ $fil->partName }}</td>
                                            <td>{{ $fil->descripcion }}</td>
                                            <td>{{ $fil->cantidad }}</td>
                                        
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    
                </div>  
            </div>
        </div>
    </div>
@endsection


@section('footer')
    <div style="text-align:center"> <h6>@copyryght KmgFueguina</h5></div>
@endsection