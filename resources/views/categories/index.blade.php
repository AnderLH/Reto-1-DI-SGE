@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Categorías</h1>

    <ul class="list-group">
        @auth
        <a href="{{ route('categories.create') }}" class="btn btn-success" role="button">Crear nueva Categoria</a>
        @endauth
        @forelse ($categories as $category)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-0"><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></h2>
                    <p class="text-muted">Escrito el {{ $category->created_at }}</p>
                    <h6>Últimas incidencias:</h6>
                    <ul class="list-group">
                        
                        @forelse ($category->incidents->sortByDesc('created_at')->take(5) as $incident)
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
                        <p>No hay incidencias disponibles.</p> <!-- Agregar este mensaje si no hay incidencias asociadas -->
                        
                        @endforelse
                    </ul>
                </div>
                @auth
                <div>
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm" role="button">Editar</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </div>
                @endauth
            </div>
        </li>
        @empty
        <li class="list-group-item">No hay categorías disponibles.</li>
        @endforelse
    </ul>
</div>
@endsection
