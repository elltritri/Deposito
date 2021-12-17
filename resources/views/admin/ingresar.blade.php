@extends('adminlte::page')


@section('content')
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-sm-12 mt-4">
                <div class="card">
                    <div class="card-body" style="text-align: center">
                        <div class="col-auto">
                        <form action="{{ route('admin.importarDatos') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                            <div class="card-body">
                                <div class="col-sm-6" style="float: left">
                                    <label for="">Ingrese N° Factura</label>
                                    <input type="text" name="numeroFactura" id="numeroFactura" class="form-control"  required>
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
                            </div>
                            </p>
                            <div class="col-sm-12" style="float: left">
                                <label for="formFile">Seleccione el Packing List</label>
                                {{-- <input type="file" name="file" class="btn btn-sm btn-primary" required> --}}
                                <input class="form-control" type="file" id="file" name="file">
                            </div> 
                                                          
                            <div class="col-sm-12 mt-4" style="float: left">
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



    
