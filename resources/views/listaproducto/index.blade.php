@extends('adminlte::page')

@section('template_title')
    Listaproducto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listaproducto') }}
                            </span>

                             <div class="float-right">
                                {{-- <a href="{{ route('listaproducto.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a> --}}
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
                                        
										<th>Numerofactura</th>
										<th>Producto</th>
										<th>Modelo</th>
										<th>Partcode</th>
										<th>Codigoalternativo</th>
										<th>Partname</th>
										<th>Cantidad</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listaproductos as $listaproducto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $listaproducto->numeroFactura }}</td>
											<td>{{ $listaproducto->producto }}</td>
											<td>{{ $listaproducto->modelo }}</td>
											<td>{{ $listaproducto->partCode }}</td>
											<td>{{ $listaproducto->codigoAlternativo }}</td>
											<td>{{ $listaproducto->partName }}</td>
											<td>{{ $listaproducto->cantidad }}</td>

                                            <td>
                                                <form action="{{ route('listaproductos.destroy',$listaproducto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('listaproductos.show',$listaproducto->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('listaproductos.edit',$listaproducto->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $listaproductos->links() !!}
            </div>
        </div>
    </div>
@endsection
