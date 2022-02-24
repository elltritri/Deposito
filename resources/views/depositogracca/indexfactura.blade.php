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

            {{-- INICIO DE FORMULARIO --}}
            <form id="IngresarProducto" method="POST">
                <input type="hidden" value="{{csrf_token()}}" name="_token" id="token">
                <div class="card" style="text-align: center">
                    <div class="card-body">
                        <div class="col-sm-3" style="float: left">
                            <label for="">N° Factura :</label>
                            <input type="text" name="numeroFactura" id="numeroFactura" value="{{ $factura }}" class="form-control"   required>
                                @if(Session::has('message'))
                                    <p style="color: red">{!! Session::get('message') !!}</p>
                                @endif
                            </div>
                        <div class="col-sm-3" style="float: left">
                            <label for="">N° Guia</label>
                            <input type="text" name="guia" id="guia" value="{{ $guia }}" class="form-control"   required>
                                @if(Session::has('message'))
                                    <p style="color: red">{!! Session::get('message') !!}</p>
                                @endif
                            </div>
                        <div class="col-sm-3" style="float: left">
                            <label for="">Producto:</label>
                            <input type="text" name="producto" id="producto" value="{{ $producto }}" class="form-control"   required>
                                @if(Session::has('message'))
                                    <p style="color: red">{!! Session::get('message') !!}</p>
                                @endif
                        </div>
                        <div class="col-sm-3" style="float: left">
                            <label for="">Modelo:</label>
                                <input type="text" name="modelo" id="modelo" value="{{ $modelo }}"  class="form-control"  required>
                                @if(Session::has('message'))
                                    <p style="color: red">{!! Session::get('message') !!}</p>
                                @endif
                        </div>
                    </div>
                </div> 
                <div class="card">
                    <div class="card-body" >
                        <div class="col-sm-3 "  style="float: left">
                            <label for="">Fecha:</label>
                            <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo date("Y-m-d");?>"  placeholder="Ingrese la Fecha"  required>
                            @if(Session::has('message'))
                                <p style="color: red">{!! Session::get('message') !!}</p>
                            @endif
                        </div>
                        <div class="col-sm-3 "  style="float: left">
                            <label for="">Cantidad:</label>
                            <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="Ingrese la Cantidad"  required>
                            @if(Session::has('message'))
                                <p style="color: red">{!! Session::get('message') !!}</p>
                            @endif
                        </div>
                        <div class="col-sm-3 " style="float: left">
                            <label for="">Part Code:</label>
                            <input type="text" name="partCode" id="partCode" class="form-control" value="" placeholder="Ingrese PartNumber"  required>
                            @if(Session::has('message'))
                                <p style="color: red">{!! Session::get('message') !!}</p>
                            @endif
                        </div>
                        <br>
                        <div class="col-sm-3 " style="float:left;text-align: center">
                            <input type="submit" value="Guardar" id="enviar" class="btn btn-sm btn-primary ">
                        </div>  
                    </div>
                </div> 
            </form>
            {{-- FIN FORMULARIO --}}
            {{-- TABLA DE VALORES --}}
             <div class="card" id="tabla">
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th>Cantidad</th>
                                <th>PartCode</th>
                                <th>Fecha Ingreso</th>
                                <th>Fecha de Vencimiento</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $depositogracca)
                                <tr>
                                    <td>{{ $depositogracca->cantidad }}</td>
                                    <td>{{ $depositogracca->partCode }}</td>
                                    <td>{{ $depositogracca->created_at }}</td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Editar
                                        </button>
                                    </td>


                                    
                                      
                                      <!-- Modal -->
                                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              ...
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>




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
    $(document).ready(function(){
        
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
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@endsection
