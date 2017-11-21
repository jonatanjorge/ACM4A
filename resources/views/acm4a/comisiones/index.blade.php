@extends('template')

    @section('nombreSeccion')
        Comisiones <small>Listado</small>
    @endsection


    @section('content')
        <div class="col-xs-12">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Carrera</th>
                        <th>Turno</th>
                        <th>Cuatrimestre</th>
                        <th>Division</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($comisiones as $comision)
                    <tr>
                        <td><?= $comision->id ?></td>
                        <td><?= $comision->nombre ?></td>
                        <td><?= $comision->carrera->nombre ?></td>
                        <td><?= $comision->turno ?></td>
                        <td><?= $comision->cuatrimestre ?></td>
                        <td><?= $comision->division ?></td>
                        <td>
                            <form action="{{ route("comisiones.destroy",$comision->id)  }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="btn-group btn-group-xs">
                                    <a href="comisiones/edit/{{ $comision->id }}" class="btn btn-success">
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
