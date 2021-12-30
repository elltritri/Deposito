@extends('layouts.app')

@section('template_title')
    Listadofactura
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listadofactura') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('listadofacturas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Guia</th>
										<th>Numerofactura</th>
										<th>Producto</th>
										<th>Modelo</th>
										<th>Partcode</th>
										<th>Codigoalternativo</th>
										<th>Partname</th>
										<th>Descripcion</th>
										<th>Cantidad</th>
										<th>Origen</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listadofacturas as $listadofactura)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $listadofactura->guia }}</td>
											<td>{{ $listadofactura->numeroFactura }}</td>
											<td>{{ $listadofactura->producto }}</td>
											<td>{{ $listadofactura->modelo }}</td>
											<td>{{ $listadofactura->partCode }}</td>
											<td>{{ $listadofactura->codigoAlternativo }}</td>
											<td>{{ $listadofactura->partName }}</td>
											<td>{{ $listadofactura->descripcion }}</td>
											<td>{{ $listadofactura->cantidad }}</td>
											<td>{{ $listadofactura->origen }}</td>

                                            <td>
                                                <form action="{{ route('listadofacturas.destroy',$listadofactura->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('listadofacturas.show',$listadofactura->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('listadofacturas.edit',$listadofactura->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $listadofacturas->links() !!}
            </div>
        </div>
    </div>
@endsection
