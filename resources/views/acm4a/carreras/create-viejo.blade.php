@extends('template')
    @section('css')
        <!-- Select2 -->
        <link rel="stylesheet" href="assets/bower_components/select2/dist/css/select2.min.css">
    @endsection

    @section('nombreSeccion')
        Carreras <small>Nueva carrera</small>
    @endsection


    @section('content')
        <div class="col-xs-12">
            <form action="{{route('carreras.store')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token()  }}">

                <div class="form-group">
                    <label>Nombre de carrera</label>
                    <input value="{{ old('nombre') }}" type="text" name="nombre" placeholder="Diseño Gráfico" class="form-control">
                </div>

                <div class="form-group">
                    <label>Alias de carrera</label>
                    <input value="{{ old('alias') }}" type="text" name="alias" placeholder="DG" class="form-control">
                </div>

                <div class="form-group">
                    <label>Coordinador a cargo</label>
                    <select class="form-control select2" name="coordinador"
                    style="width: 100%;">
                        @foreach($coordinadores as $coord)

                            <option {{ $coord->id == old('coordinador') ? 'selected = "selected"' : ''  }} value="{{ $coord->id  }}">{{ $coord->full_name  }}</option>

                        @endforeach
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
