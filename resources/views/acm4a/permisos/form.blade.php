@extends('template')
    @section('css')
        <!-- Select2 -->
        <link rel="stylesheet" href="assets/bower_components/select2/dist/css/select2.min.css">
    @endsection

    @section('nombreSeccion')
        Permisos <small>
            @if(isset($permiso))
                Editar {{ $permiso->nombre }}
            @else
                Nuevo Permiso
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
                {{ Form::model($permiso,["route" => ["permisos.update",$permiso->id],'method' => "put"])  }}
            @else
                {{ Form::open(["route" => "permisos.store",'method' => "post"])  }}
            @endif
                {{-- Coloca automáticamente el csrf_token() --}}



                <div class="form-group">
                    {{ Form::label("accion", "Acción a realizar") }}


                    {{ Form::select("accion",$acciones, null,["class" => "select2 form-control"]) }}
                </div>


                <div class="form-group">
                    {{ Form::label("readable_name", "Permiso") }}

                    @if(isset($permiso))
                        {{ Form::text("readable_name", $permiso->readable_name,["placeholder" => "Permisos","class" => "form-control"]) }}
                    @else

                        {{ Form::text("readable_name", null,["placeholder" => "Permisos","class" => "form-control"]) }}
                    @endif
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
