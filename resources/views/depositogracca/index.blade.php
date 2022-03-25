@extends('adminlte::page')

@section('template_title')
    Depositogracca
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Deposito') }}
                            </span>

                             <div class="float-right">
                                
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
                            <table id="tabla1" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        
										<th>Guia</th>
										<th>Numerofactura</th>
										<th>Producto</th>
										<th>Modelo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($depositograccas as $depositogracca)
                                        <tr>
                                            {{-- <td>{{ $depositogracca->id }}</td> --}}
											<td>{{ $depositogracca->guia }}</td>
											<td>{{ $depositogracca->numeroFactura }}</td>
											<td>{{ $depositogracca->producto }}</td>
											<td>{{ $depositogracca->modelo }}</td>
                                            <td>
                                                
                                             
                                                 {{-- <form action="{{ route('depositogracca.destroy',$depositogracca->id) }}" method="POST">  --}}
                                                    <a class="btn btn-sm btn-primary " href="{{ route('depositogracca.agregar',$depositogracca->numeroFactura) }}"><i class="fa fa-fw fa-eye"></i>Ingreso</a>
                                                    {{-- <a class="btn btn-sm btn-success" href="{{ route('depositogracca.edit',$depositogracca->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>  --}}
                                            </td>
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

