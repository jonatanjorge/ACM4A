@extends('template')

    @section('nombreSeccion')
        Permisos <small>Listado</small>
    @endsection


    @section('content')
        <div class="col-xs-12">
            <a href="{{ route("permisos.create") }}" class="btn btn-primary pull-right">Nuevo permiso</a>
        </div>

        <div class="col-xs-12">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($permisos as $permiso)
                        <tr>
                            <td><?= $permiso->id ?></td>
                            <td><?= $permiso->readable_name ?></td>
                            <td>
                                {{ Form::open(['route' => ['permisos.destroy',$permiso->id], 'method' => "delete"])  }}

                                    <div class="btn-group btn-group-xs">
                                        <a href="{{ route("permisos.edit",$permiso->id) }}" class="btn btn-success">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <button class="btn btn-danger" type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                    </div>

                                {{ Form::close() }}
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td class="text-center" colspan="3"> No hay permisos cargados</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    @endsection
