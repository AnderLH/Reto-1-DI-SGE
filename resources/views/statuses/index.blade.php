@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Estados</h1>
    <div class="row">
        <div class="col-md-4">
            @auth
            <a href="{{ route('statuses.create') }}" class="btn btn-success" role="button">Crear Estado</a>
            @endauth
        </div>
    </div>
    <ul class="list-group">
        @forelse ($statuses as $status)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0">
                        <a href="{{ route('statuses.show', $status) }}">{{ $status->name }}</a>
                    </h5>
                    <p class="text-muted">Escrito el {{ $status->created_at }}</p>
                    <h6>Últimas incidencias:</h6>
                    <ul class="list-group">
                        @forelse ($status->incidents->sortByDesc('created_at')->take(5) as $incident)
                        <li class="list-group-item">
                            <h5><a href="{{ route('incidents.show', $incident) }}">{{ $incident->title }} - {{ $incident->created_at }}</a></h5>
                        </li>
                        @empty
                        <p>No hay incidencias disponibles.</p> <!-- Agregar este mensaje si no hay incidencias asociadas a un estado -->
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
        <li class="list-group-item">No hay estados disponibles.</li>
        @endforelse
    </ul>
</div>
@endsection