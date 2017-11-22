@extends('template')

@section('nombreSeccion')
    Talleres <small>Listado</small>
@endsection


@section('content')
    <div class="col-xs-12">
        <table class="table table-stripped">
            <thead>
            <tr>
                <td>Id</td>
                <td>Nombre</td>
                <td>Profesor ID</td>
                <td>Horario</td>
                <td>Cantidad de horas</td>
                <td>Fecha inicio</td>
                <td>Acciones</td>
            </tr>
            </thead>

            <tbody>

            @foreach($talleres as $taller)

                <tr>
                    <td><?= $taller->id ?></td>
                    <td><?= $taller->nombre ?></td>
                    <td><?= $taller->profesor_id ?></td>
                    <td><?= $taller->horario ?></td>
                    <td><?= $taller->cantidad_horas ?></td>
                    <td><?= $taller->fecha_inicio ?></td>
                    <td>
                        <form action="{{ route("talleres.destroy",$taller->id)  }}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="btn-group btn-group-xs">
                                <a href="{{ route("talleres.edit",$taller->id) }}" class="btn btn-success">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <button class="btn btn-danger" type="submit">
                                    <i class="fa fa-trash"></i>
                                </button>

                                @if($taller->isDeleted)
                                    <a href="{{ route("carreras.restore",$taller->id) }}" class="btn btn-warning">
                                        <i class="fa fa-undo"></i>
                                    </a>
                                @endif
                            </div>

                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach

        </table>
    </div>


@endsection