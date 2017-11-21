@extends('template')
    @section('css')
        <!-- Select2 -->
        <link rel="stylesheet" href="assets/bower_components/select2/dist/css/select2.min.css">
    @endsection

    @section('nombreSeccion')
        Comisiones <small>Editar Comisión</small>
    @endsection


    @section('content')
        <div class="col-xs-12">
            <form action="{{route('comisiones.update',$cid->id)}}" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token()  }}">

                <div class="form-group">
                    <h2>{{ $cid->nombre }}</h2>
                </div>

                <div class="form-group">
                    <label>Carrera</label>
                    <select class="form-control select2" name="carreras_id" style="width: 100%;">

                            @foreach($carreras as $carrera)
                                @if($cid->carreras_id === $carrera->id)
                                    <option value="{{ $carrera->id }}" selected>{{ $carrera->nombre }}</option>
                                @else
                                    <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                                @endif
                            @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label>Turno</label>
                    <select class="form-control select2" name="turno" style="width: 100%;">

                        <option value="mañana" {{ $cid->turno === "mañana" ? 'selected' : null }}>Mañana</option>
                        <option value="tarde" {{ $cid->turno === "tarde" ? 'selected' : null }}>Tarde</option>
                        <option value="noche" {{ $cid->turno === "noche" ? 'selected' : null }}>Noche</option>

                    </select>
                </div>

                <div class="form-group">
                    <label>Cuatrimestre</label>
                    <select class="form-control select2" name="cuatrimestre" style="width: 100%;">

                        @for($i = 1; $i < 7; $i++)
                            <option value="{{ $i }}"{{ $cid->cuatrimestre == $i ? 'selected' : null }}>{{ $i }}° Cuatrimestre</option>
                        @endfor

                    </select>
                </div>

                <div class="form-group">
                    <label>División</label>
                    <select class="form-control select2" name="division" style="width: 100%;">

                            <option value="A"{{ $cid->division === "A" ? 'selected' : null }}>A</option>
                            <option value="B"{{ $cid->division === "B" ? 'selected' : null }}>B</option>
                            <option value="C"{{ $cid->division === "C" ? 'selected' : null }}>C</option>
                            <option value="D"{{ $cid->division === "D" ? 'selected' : null }}>D</option>
                            <option value="E"{{ $cid->division === "E" ? 'selected' : null }}>E</option>

                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Editar</button>
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
