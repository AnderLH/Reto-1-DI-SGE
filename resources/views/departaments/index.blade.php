@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Departamentos</h1>
    <ul class="list-group">
    @auth
        <a href="{{ route('departaments.create') }}" class="btn btn-success" role="button">Crear Departamento</a>
        @endauth
        @forelse ($departaments as $departament)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0"><a href="{{ route('departaments.show', $departament) }}">{{ $departament->name }}</a></h5>
                    <p class="text-muted">Escrito el {{ $departament->created_at }}</p>
                    <h6>Últimas incidencias:</h6>
                    <ul class="list-group">
                        @forelse ($departament->incidents->sortByDesc('created_at')->take(5) as $incident)
                        <li class="list-group-item">
                            <h5><a href="{{ route('incidents.show', $incident) }}">{{ $incident->title }} - {{ $incident->created_at }}</a></h5>
                        </li>
                        @empty
                        <p>No hay incidencias disponibles.</p>
                        @endforelse
                        
                    </ul>
                </div>
                @auth
                <div>
                    <a href="{{ route('departaments.edit', $departament) }}" class="btn btn-warning btn-sm" role="button">Editar</a>
                    <form action="{{ route('departaments.destroy', $departament) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </div>
                @endauth
            </div>
        </li>
        @empty
        <li class="list-group-item">No hay departamentos disponibles.</li>
        @endforelse
    </ul>
</div>
@endsection