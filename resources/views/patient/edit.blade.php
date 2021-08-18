@extends('layouts.master')

@section('title')Pacientes @endsection
@section('patient_active')active @endsection

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    {{--dd($director)--}}
    <h1 class="mt-2">Pacientes</h1>
    <div class="card">
        <div class="card-header">{{ __('Editar Unidad Médica') }}</div>

        <div class="card-body">

        <form action="{{ route('directors.update', $director->id_director) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('put')}}

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Model">Nombre</label>
                    <input type="text" class="form-control" id="name" value="{{$director->name, $director->last_name}}" required readonly>
                </div>

                <input type="text" class="form-control" id="id_director" name="id_director" value="{{$director->id_director}}" required hidden>
                <input type="text" class="form-control" id="id_user" name="id_user" value="{{$director->id_user}}" required hidden>

                <div class="form-group col-md-4">
                    <label for="id_unit">Unidad Médica</label>
                    <select id="id_unit" class="form-control" name="id_unit">
                        {{-- <option value="NULL" selected>Ninguno</option>  ME DA ERROR EL LARAVEL AUNQUE EN MYSQL NO HAY PROBLEMA--}}
                        @foreach ( $units as $unit)
                            {{-- <option value="{{$unit['id_unit']}}" selected>{{$unit['name']}}</option> --}}
                            <option value="{{$unit->id_unit}}">{{$unit->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-12 col-12 text-right mb-4">
                <a href="{{ route('directors') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

</main>
@endsection
