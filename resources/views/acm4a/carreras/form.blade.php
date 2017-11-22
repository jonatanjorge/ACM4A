@extends('template')
    @section('css')
        <!-- Select2 -->
        <link rel="stylesheet" href="assets/bower_components/select2/dist/css/select2.min.css">
    @endsection

    @section('nombreSeccion')
        Carreras <small>
            @if(isset($carrera))
                Editar {{ $carrera->nombre }}
            @else
                Nueva carrera
            @endif
        </small>
    @endsection


    @section('content')
        <div class="col-xs-12">


            {{--
                PRIMER PARÁMETRO -> action
                SEGUNDO PARÁMETRO -> method
             --}}
            @if(isset($carrera))
                {{--
                    Si voy a editar uso un Form::model que no abre un formulario vacio sino que abre un formulario en base al modelo que le pase como primer parámetro (segundo parámetro va el array de datos)
                    En el edit, si tengo que pasar un id el parámetro del route va como array, el primer valor es el alias y el segundo es el id a pasar
                 --}}
                {{ Form::model($carrera,["route" => ["carreras.update",$carrera->id],'method' => "put"])  }}
            @else
                {{ Form::open(["route" => "carreras.store",'method' => "post"])  }}
            @endif
                {{-- Coloca automáticamente el csrf_token() --}}

                <div class="form-group">
                    {{ Form::label("nombre", "Nombre de la carrera") }}

                    {{ Form::text("nombre", null,["placeholder" => "Diseño Gráfico","class" => "form-control"]) }}

                </div>

                <div class="form-group">
                    <label>Alias de carrera</label>
                    {{ Form::text("alias",null, ["placeholder" => "DG", "class" => "form-control"]) }}

                </div>

                <div class="form-group">
                    <label>Coordinador a cargo</label>

                    {{--
                        Primer parámetro -> name,
                        Segundo parámetro -> array de datos ($coordinadores = User::all())
                                Formato -> id => valor,
                        Tercer parámetro -> selected item
                        Cuarto parámetro -> options
                    --}}
                    {{ Form::select("coordinador",$coordinadores,null,["style" => 'width: 100%','class' => "form-control select2"]) }}

                </div>

                {{ Form::submit('Cargar',["class" => "btn btn-primary"]) }}

            {{ Form::close() }}
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
