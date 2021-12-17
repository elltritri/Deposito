@extends('adminlte::page')


@section('content')
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-sm-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="col-auto">
                        <form action="{{ route('admin.importarDatos') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                            <div class="card-body">
                                <div>
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
                                </div>
                                
                                <div>
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
                                </div>
                            </div>
                            </p>
                            <div class="col-sm-12" style="text-align: center">
                                <label for="formFile">Seleccione el Packing List</label>
                                {{-- <input type="file" name="file" class="btn btn-sm btn-primary" required> --}}
                                <input class="form-control" type="file" id="file" name="file">
                            </div> 
                                                          
                            <div class="col-sm-12 mt-4" style="text-align: center">
                                <input type="submit" value="Guardar y Enviar" class="btn btn-sm btn-primary ">
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



    
