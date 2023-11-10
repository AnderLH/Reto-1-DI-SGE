@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center" id="depart-styles">Lista de Estados</h1>
    <ul class="list-group">
        @auth
            <a href="{{ route('statuses.create') }}" class="btn btn-success" role="button">Crear Estado</a>
            @endauth
        @forelse ($statuses as $status)
        <li class="list-group-item" id="list-item-{{ $status->id }}">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0">
                        <a href="{{ route('statuses.show', $status) }}" id="incident-title">{{ $status->name }}</a>
                    </h5>
                    <p class="text-muted" id="incident-date">Escrito el {{ $status->created_at }}</p>
                    <h6 id="incident-subtitle">Últimas incidencias:</h6>
                    <ul class="list-group" id="incident-list">
                        @forelse ($status->incidents->sortByDesc('created_at')->take(5) as $incident)
                        @auth
                        @if ($incident->departament_id == auth()->user()->departament_id)
                        <li class="list-group-item">
                            <h5><a href="{{ route('incidents.show', $incident) }}" id="incident-title">{{ $incident->title }} - {{ $incident->created_at }}</a></h5>
                        </li>
                        @endauth
                        @else
                        <li class="list-group-item">
                            <h5><a href="{{ route('incidents.show', $incident) }}" id="incident-title">{{ $incident->title }} - {{ $incident->created_at }}</a></h5>
                        </li>
                        @endif
                        
                        @empty
                        <p id="incident-title">No hay incidencias disponibles.</p>
                        @endforelse
                    </ul>
                </div>
                @auth
                <div>
                    <a href="{{ route('statuses.edit', $status) }}" class="btn btn-warning btn-sm" role="button">Editar</a>
                    <form action="{{ route('statuses.destroy', $status) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </div>
                @endauth
            </div>
        </li>
        @empty
        <li class="list-group-item" id="incident-title">No hay estados disponibles.</li>
        @endforelse
    </ul>
</div>
@endsection
