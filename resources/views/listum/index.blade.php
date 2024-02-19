@extends('layouts.app')

@section('template_title')
    Listum
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    @role('estudiante')
                    <p>{{ __('Estudiantes Ingresados') }}</p>
                    @endrole
                    <div class="card-header">
                    @role('admin')
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Listado') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('lista.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Nuevo Registro') }}
                                </a>
                              </div>
                        </div>
                    @endrole
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
                                        <th>N°</th>
                                        
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Genero</th>
										<th>Fecha de ingreso</th>
										<th>Telefono</th>
										<th>Correo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lista as $listum)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $listum->nombre }}</td>
											<td>{{ $listum->apellido }}</td>
											<td>{{ $listum->genero }}</td>
											<td>{{ $listum->fecha }}</td>
											<td>{{ $listum->telefono }}</td>
											<td>{{ $listum->correo }}</td>

                                            <td>
                                                <form action="{{ route('lista.destroy',$listum->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('lista.show',$listum->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mirar') }}</a>
                                                    @role('admin')
                                                    <a class="btn btn-sm btn-success" href="{{ route('lista.edit',$listum->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                    @endrole
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $lista->links() !!}
            </div>
        </div>
    </div>
@endsection
