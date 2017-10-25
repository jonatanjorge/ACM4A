@extends('template')

    @section('nombreSeccion')
        Carreras <small>Listado</small>
    @endsection


    @section('content')
        <div class="col-xs-12">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Alias</th>
                        <th>Coordinador</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($carreras as $carrera)
                    <tr>
                        <td><?= $carrera->id ?></td>
                        <td><?= $carrera->nombre ?></td>
                        <td><?= $carrera->alias ?></td>
                        <td><?= $carrera->coord->full_name ?></td>
                        <td>
                            <form action="{{ route("carreras.destroy",$carrera->id)  }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="btn-group btn-group-xs">
                                    <a href="" class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>

                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach

            </table>
        </div>


    @endsection
