@extends('template')

@section('nombreSeccion')
    Materias <small>
        @if(isset($carrera))
            Editar {{ $carrera->nombre }}
        @else
            Nueva materia
        @endif
    </small>
@endsection

@section('content')
    <div class="col-xs-12">

        @if(isset($materia))
            {{--
                Si voy a editar uso un Form::model que no abre un formulario vacio sino que abre un formulario en base al modelo que le pase como primer parámetro (segundo parámetro va el array de datos)
                En el edit, si tengo que pasar un id el parámetro del route va como array, el primer valor es el alias y el segundo es el id a pasar
             --}}
            {{ Form::model($materia,["route" => ["materias.update",$materia->id],'method' => "put"])  }}
        @else
            {{ Form::open(["route" => "materias.store",'method' => "post"])  }}
        @endif
        {{-- Coloca automáticamente el csrf_token() --}}

        <div class="form-group">
            {{ Form::label("nombre", "Nombre de la materia") }}

            {{ Form::text("nombre", null,["placeholder" => "Matematica","class" => "form-control"]) }}
        </div>


        {{ Form::submit('Cargar',["class" => "btn btn-primary"]) }}

        {{ Form::close() }}
    </div>


@endsection

