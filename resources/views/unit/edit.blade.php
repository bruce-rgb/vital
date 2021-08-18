@extends('layouts.master')

@section('title')Dashboard @endsection
@section('unit_active')active @endsection

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <h1 class="mt-2">Unidades Médicas</h1>
    <div class="card">
        <div class="card-header">{{ __('Editar Unidad Médica') }}</div>

        <div class="card-body">

        <form action="{{ route('units.update', $unit->id_unit) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('put')}}

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Model">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$unit->name}}" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="Color">Dirección</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{$unit->address}}" required>
                </div>
            </div>

            <div class="col-sm-12 col-12 text-right mb-4">
                <a href="{{ route('units') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

</main>
@endsection
