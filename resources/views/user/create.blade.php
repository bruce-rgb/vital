@extends('layouts.master')

@section('title')Usuarios @endsection
@section('user_active')active @endsection

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <h1 class="mt-2">Usuarios</h1>
    <div class="card">
        <div class="card-header">{{ __('Nuevo Director') }}</div>

        <div class="card-body">

        <form action="{{ route('users.store') }}" method="post"> <!--multipart/form-data es para el envío de la foto -->
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

                <div class="form-group col-md-4">
                    <label for="role">Rol</label>
                    <select id="role" class="form-control" name="role">
                        <option value="admin">Administrador</option>
                        <option value="director">Director</option>
                        <option value="doctor">Doctor</option>
                        <option value="patient">Paciente</option>
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

