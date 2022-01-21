@extends('adminlte::page')


@section('content')
<div class="col-sm-12 mt-4">
    <div class="container-fluid">
        
            
        <div class="row">
            
            <div class="col-sm-6 mt-4">
                <H1> BOM</H1>
                <div class="card" style="text-align: center">
                    <div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabla1" class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            {{-- <th>N° Factura</th> --}}
                                            <th>Par Code</th>
                                            {{-- <th>Codigo</th>  --}}
                                            <th>Part Name</th>
                                            {{-- <th>Descripcion</th> --}}
                                            <th>Cantidad</th>
                                            {{-- <th>Origen</th> --}}
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <a href="">{{ $producto }}</a>
                                        {{-- @foreach ($consulta as $fil)
                                            <tr>
                                                <td>{{ $fil->partCode }}</td>
                                                <td>{{ $fil->partName }}</td>
                                                <td>{{ $fil->cantidad }}</td> --}}
                                                {{-- <td>{{ $fil->codigoAlternativo }}</td> --}}
                                                {{-- <td>{{ $fil->partName }}</td> --}}
                                                {{-- <td>{{ $fil->descripcion }}</td> --}}
                                                {{-- <td>{{ $fil->cantidad }}</td> --}}
                                                {{-- <td>{{ $fil->origen }}</td> --}}
                                            
                                            {{-- </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        
                    </div>
                </div>    
            </div>


        </div>

        
        
    </div>
</div>
@endsection


@section('footer')
    <div style="text-align:center"> <h6>@copyright KmgFueguina</h5></div>
@endsection


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endsection
@section('js')

    <script>
        $(document).ready(function() {
            $('#tabla2').DataTable();
        } );
        $(document).ready(function() {
            $('#tabla1').DataTable();
        } );
    </script>
@endsection
    
