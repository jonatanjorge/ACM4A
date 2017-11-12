@extends('template')

@section('nombreSeccion')
    Materias <small>Listado</small>
@endsection


@section('content')
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

            @foreach($materias as $materia)
                <tr>
                    <td><?= $materia->id ?></td>
                    <td><?= $materia->nombre ?></td>
                    <td>
                        <form action="{{ route("materias.destroy",$materia->id)  }}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="btn-group btn-group-xs">
                                <a href="{{ route("materias.edit",$materia->id) }}" class="btn btn-success">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <button class="btn btn-danger" type="submit">
                                    <i class="fa fa-trash"></i>
                                </button>

                                @if($materia->isDeleted)
                                    <a href="{{ route("carreras.restore",$materia->id) }}" class="btn btn-warning">
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