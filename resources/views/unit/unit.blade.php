@extends('layouts.master')

@section('title')Unidades Medicas @endsection
@section('unit_active')active @endsection

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between mt-3">
        <div>
           <h1>Unidades Médicas</h1>
        </div>
        <div>
           <a href="{{ route('units.create') }}" class="btn btn-success">Crear Nueva</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th></th>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Creación</th>
                    <th>Actualización</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($units as $unit)
                <tr>
                    <td><a href="{{route('units.edit',$unit->id_unit )}}" class="btn btn-primary btn-sm">🖍</a>
                        <form action="{{route('units.delete', $unit->id_unit)}}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro que desea eliminar la unidad médica?');">
                                🗑
                            </button>
                        </form>
                    </td>
                    <td>{{$unit['id_unit']}}</td>
                    <td>{{$unit['name']}}</td>
                    <td>{{$unit['address']}}</td>
                    <td>{{$unit['created_at']}}</td>
                    <td>{{$unit['updated_at']}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</main>
@endsection
