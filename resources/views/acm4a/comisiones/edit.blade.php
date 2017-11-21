@extends('template')
    @section('css')
        <!-- Select2 -->
        <link rel="stylesheet" href="assets/bower_components/select2/dist/css/select2.min.css">
    @endsection

    @section('nombreSeccion')
        Comisiones <small>Nueva Comisión</small>
    @endsection


    @section('content')
        <div class="col-xs-12">
            <form action="{{route('comisiones.store')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token()  }}">

                <div class="form-group">
                    <label>Carrera</label>
                    <select class="form-control select2" name="carreras_id"
                    style="width: 100%;">
                        @foreach($carreras as $carrera)

                            <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>

                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Turno</label>
                    <select class="form-control select2" name="turno"
                            style="width: 100%;">

                            <option value="mañana">Mañana</option>
                            <option value="tarde">Tarde</option>
                            <option value="noche">Noche</option>

                    </select>
                </div>

                <div class="form-group">
                    <label>Cuatrimestre</label>
                    <select class="form-control select2" name="cuatrimestre"
                            style="width: 100%;">
                        @for($i = 1; $i < 7; $i++)

                            <option value="{{ $i }}">{{ $i }}° Cuatrimestre</option>

                        @endfor
                    </select>
                </div>

                <div class="form-group">
                    <label>División</label>
                    <select class="form-control select2" name="division"
                            style="width: 100%;">

                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>

                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>


    @endsection


    @section('js')
            <!-- Select2 -->
        <script src="assets/bower_components/select2/dist/js/select2.full.min.js"></script>

        <script>
            $(document).ready(function(){
                //Initialize Select2 Elements
                $('.select2').select2()

            })
        </script>
    @endsection
