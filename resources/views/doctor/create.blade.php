@extends('layouts.master')

@section('title')Médicos @endsection
@section('doctor_active')active @endsection

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <h1 class="mt-2">Médicos</h1>
    {{--dd($units)--}}
    @if (empty($units))
        {{'No hay unidades medicas disponibles, porfavor agregue una'}}
    @else
        <div class="card">
            <div class="card-header">{{ __('Nuevo Director') }}</div>

            <div class="card-body">

            <form action="{{ route('directors.store') }}" method="post"> <!--multipart/form-data es para el envío de la foto -->
                {{ csrf_field() }}

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="last_name">Apellido Paterno</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name')}}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="last_name2">Apellido Materno</label>
                        <input type="text" class="form-control" id="last_name2" name="last_name2" value="{{old('last_name2')}}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="phone">Teléfono</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}" required>
                    </div>

                    <input type="text" class="form-control" id="role" name="role" value="director" hidden>
                    <input type="text" class="form-control" id="id_user" name="id_user" value="" hidden>

                    <div class="form-group col-md-4">
                        <label for="id_unit">Unidad Médica</label>
                        <select id="id_unit" class="form-control" name="id_unit">
                            @foreach ( $units as $unit)
                                {{-- <option value="{{$unit['id_unit']}}" selected>{{$unit['name']}}</option> --}}
                                <option value="{{$unit->id_unit}}" selected>{{$unit->name}}</option>
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
    @endif

</main>
@endsection

