@extends('adminlte::page')

@section('template_title')
    Bom
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Bom') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('bom.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    @foreach ($boms as $bom)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $bom->partCode }}</td>
											<td>{{ $bom->codigoAlternativo }}</td>
											<td>{{ $bom->partName }}</td>
											<td>{{ $bom->descripcion }}</td>
											<td>{{ $bom->cantidad }}</td>
											<td>{{ $bom->origen }}</td>

                                            <td>
                                                <form action="{{ route('bom.destroy',$bom->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('bom.show',$bom->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('bom.edit',$bom->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
           
            </div>
        </div>
    </div>

@endsection
<script>
        $(document).ready(function() {
            $('#tabla2').DataTable();
        } );
</script>
