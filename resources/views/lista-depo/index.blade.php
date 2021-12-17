@extends('adminlte::page')

@section('template_title')
    Lista Depo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Lista Depo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ view('lista-depo.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    {{-- @foreach ($listaDepos as $listaDepo) --}}
                                        <tr>
                                            {{-- <td>{{ ++$i }}</td> --}}
                                            
											{{-- <td>{{ $listaDepo->numeroFactura }}</td>
											<td>{{ $listaDepo->producto }}</td>
											<td>{{ $listaDepo->modelo }}</td>
											<td>{{ $listaDepo->partCode }}</td>
											<td>{{ $listaDepo->codigoAlternativo }}</td>
											<td>{{ $listaDepo->partName }}</td>
											<td>{{ $listaDepo->cantidad }}</td> --}}

                                            <td>
                                                {{-- <form action="{{ view('lista-depos.destroy',$listaDepo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ view('lista-depos.show',$listaDepo->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ view('lista-depos.edit',$listaDepo->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {{-- {!! $listaDepos->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
