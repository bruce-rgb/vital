@extends('layouts.master')

@section('title')Pacientes @endsection
@section('patient_active')active @endsection

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between mt-3">
        <div>
           <h1>Pacientes</h1>
        </div>
        <div>
           <a href="{{ route('directors.create') }}" class="btn btn-success">Crear Nueva</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th></th>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Unidad</th>
                    <th>Dirección</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($directors as $director)
                <tr>
                    <td><a href="{{route('directors.edit',$director->id_director )}}" class="btn btn-primary btn-sm">🖍</a>
                        <form action="{{route('directors.delete', $director->id_director)}}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro que desea eliminar la unidad médica?');">
                                🗑
                            </button>
                        </form>
                    </td>
                    <td>{{$director->id_director}}</td>
                    <td>{{$director->name, $director->last_name}}</td>
                    <td>{{$director->name_unit}}</td>
                    <td>{{$director->address}}</td>
                    <td>{{$director->created_at}}</td>
                    <td>{{$director->updated_at}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</main>
@endsection
