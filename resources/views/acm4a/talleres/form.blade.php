@extends('template')

@section('nombreSeccion')
    Talleres <small>
        @if(isset($taller))
            Editar {{ $taller->nombre }}
        @else
            Nueva Taller
        @endif
    </small>
@endsection

@section('content')
    <div class="col-xs-12">

        @if(isset($taller))

            {{ Form::model($taller,["route" => ["talleres.update",$taller->id],'method' => "put"])  }}
        @else
            {{ Form::open(["route" => "talleres.store",'method' => "post"])  }}
        @endif
        {{-- Coloca automáticamente el csrf_token() --}}

        <div class="form-group">
            {{ Form::label("nombre", "Nombre del Taller") }}

            {{ Form::text("nombre", null,["placeholder" => "Node.js","class" => "form-control"]) }}
        </div>
            <div class="form-group">
                {{ Form::label("profesor_id", "Profesor") }}

                {{ Form::select("profesor_id", $coordinadores, null,["placeholder" => "Profesores","class" => "form-control"]) }}
            </div>
            <div class="form-group">
                {{ Form::label("horario", "Horario") }}

                {{ Form::text("horario", null,["placeholder" => "15-16","class" => "form-control"]) }}
            </div>
            <div class="form-group">
                {{ Form::label("cantidad_horas", "Cantidad de Horas") }}

                {{ Form::text("cantidad_horas", null,["placeholder" => "5","class" => "form-control"]) }}
            </div>
            <div class="form-group">
                {{ Form::label("fecha_inicio", "Fecha de inicio") }}

                {{ Form::text("fecha_inicio", null,["placeholder" => "18/6","class" => "form-control"]) }}
            </div>


        {{ Form::submit('Cargar',["class" => "btn btn-primary"]) }}

        {{ Form::close() }}
    </div>


@endsection

