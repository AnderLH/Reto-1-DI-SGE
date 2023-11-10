@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Prioridades</h1>
    <div class="row">
        <div class="col-md-4">
            @auth
            <a href="{{ route('priorities.create') }}" class="btn btn-success" role="button">Crear Prioridad</a>
            @endauth
        </div>
    </div>
    <ul class="list-group">
        @forelse ($priorities as $priority)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0">
                        <a href="{{ route('priorities.show', $priority) }}">{{ $priority->name }}</a>
                    </h5>
                    <p class="text-muted">Escrito el {{ $priority->created_at }}</p>
                    <h6>Últimas incidencias:</h6>
                    <ul class="list-group">
                        @forelse ($priority->incidents->sortByDesc('created_at')->take(5) as $incident)
                        @auth
                        @if ($incident->departament_id == auth()->user()->departament_id)
                        <li class="list-group-item">
                            <h5><a href="{{ route('incidents.show', $incident) }}">{{ $incident->title }} - {{ $incident->created_at }}</a></h5>
                        </li>
                        @endauth
                        @else
                        <li class="list-group-item">
                            <h5><a href="{{ route('incidents.show', $incident) }}">{{ $incident->title }} - {{ $incident->created_at }}</a></h5>
                        </li>
                        @endif
                        @empty
                        <p>No hay incidencias disponibles.</p> <!-- Agregar este mensaje si no hay incidencias asociadas a la prioridad -->
                        @endforelse
                    </ul>
                </div>
                @auth
                <div>
                    <a href="{{ route('priorities.edit', $priority) }}" class="btn btn-warning btn-sm" role="button">Editar</a>
                    <form action="{{ route('priorities.destroy', $priority) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </div>
                @endauth
            </div>
        </li>
        @empty
        <li class="list-group-item">No hay prioridades disponibles.</li>
        @endforelse
    </ul>
</div>
@endsection