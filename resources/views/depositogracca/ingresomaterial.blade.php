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
            
            
            
            {{-- TABLA DE VALORES --}}
             <div class="card" id="tabla">
                <div class="card-body">
                <div class="table-responsive">
                    <table id="table1" class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th>N° Factura</th>
                                <th>Producto</th>
                                <th>Modelo</th>
                                <th>Cantidad</th>
                                <th> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarModal">
                                    Agregar Factura
                                </button></th>
                                <!-- Modal -->
                                    <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Agregar Factura</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                    <form action="{{ route('ingresarFacturaPanol') }}" method="POST">
                                                        @csrf @method('PUT')
                                                        <div class="modal-body">
                                                            
                                                            <label for="">Numero Factura:</label>
                                                            <input type="text" name="numeroFactura" id="numeroFactura" class="form-control"placeholder="Ingrese la numeroFactura"  required>
                                                            @if(Session::has('message'))
                                                                <p style="color: red">{!! Session::get('message') !!}</p>
                                                            @endif
                                                            
                                                            <label for="">Producto:</label>
                                                            {{ Form::select('producto', $producto ,null, ['class' => 'form-control' . ($errors->has('producto') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el Producto']) }}
                                                            {!! $errors->first('Producto', '<div class="invalid-feedback">:message</p>') !!}

                                                            <label for="">Modelo:</label>
                                                            <input type="text" name="modelo" id="modelo" class="form-control"placeholder="Ingrese la modelo"  required>
                                                            @if(Session::has('message'))
                                                                <p style="color: red">{!! Session::get('message') !!}</p>
                                                            @endif
                                                            <label for="">Cantidad o  Lote:</label>
                                                            <input type="number" name="cantidadlote" id="cantidadlote" class="form-control"placeholder="Ingrese la cantidadlote"  required>
                                                            @if(Session::has('message'))
                                                                <p style="color: red">{!! Session::get('message') !!}</p>
                                                            @endif
                                                            
                                                        </div>    
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                                        </div>
                                                    </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listado as $depositogracca)
                                <tr>
                                    <td>{{ $depositogracca->numeroFactura }}</td>
                                    <td>{{ $depositogracca->producto }}</td>
                                    <td>{{ $depositogracca->modelo }}</td>
                                    <td>{{ $depositogracca->lote }}</td>
                                    <td>
                                        
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            {{-- FIN TABLA DE VALORES   --}}
        </div>
    </div>
        
    @endsection
</div>

    
@section('js')

<script>
        $(document).on('click','#enviar', function(e) {
            e.preventDefault();
            var data={
                'guia': $('#guia').val(),
                'numeroFactura': $('#numeroFactura').val(),
                'producto': $('#producto').val(),
                'modelo': $('#modelo').val(),
                'cantidad': $('#cantidad').val(),
                'partCode': $('#partCode').val(),
            }
            // console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
            $.ajax({
                type: "POST",
                url: "{{ route('depositogracca.ingresoproducto')}}",
                data: data,
                dataType:"json",
                success: function (response) {
                    console.log(response);
                    location.reload();
                }
            });
        })
    });
</script>
@endsection