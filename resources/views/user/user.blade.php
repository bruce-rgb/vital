@extends('layouts.master')

@section('title')Usuarios @endsection
@section('user_active')active @endsection

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between mt-3">
        <div>
           <h1>Usuarios</h1>
        </div>
        <div>
           <a href="{{ route('users.create') }}" class="btn btn-success">Crear Nuevo</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th></th>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Rol</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td><a href="{{route('users.edit',$user->id_user )}}" class="btn btn-primary btn-sm">🖍</a>
                        <form action="{{route('users.delete', $user->id_user)}}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro que desea eliminar la unidad médica?');">
                                🗑
                            </button>
                        </form>
                    </td>
                    <td>{{$user->id_user}}</td>
                    <td>{{$user->name, $user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</main>
@endsection
