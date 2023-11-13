@extends('layouts.app')

@section('content')
<div class="container">
    <div class="incident">
        <h1 class="display-4">{{ $incident->title }}</h1>
        <p class="text-muted">Creado el {{ $incident->created_at }}</p>
        <ul class="list-group">
            <p class="list-group-item" style="font-size: 18px; color: #333;">{{ $incident->text }}</p>
        </ul>
        <div class="row mt-4">
            <div class="col-md-6">
                <p class="font-weight-bold">ID Usuario: {{ $incident->user_id }}</p>
                <p class="font-weight-bold">ID Departamento: {{ $incident->departament_id }}</p>
            </div>
            <div class="col-md-6">
                <p class="font-weight-bold">Estado: {{ $incident->status->name }}</p>
                <p class="font-weight-bold">Prioridad: {{ $incident->priority->name }}</p>
                <p class="font-weight-bold">Categoría: {{ $incident->category->name }}</p>
            </div>
        </div>

        <p class="mt-3">Duración: {{ $incident->minutes }} minutos</p>
    </div>

    <!-- Sección de comentarios -->
@auth
    <div class="comments">
        <h2>Comentarios</h2>
        <ul class="list-group">
            @forelse ($incident->comments as $comment)
                @if ($comment->incident_id == $incident->id)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $comment->user->name }}:</strong>
                            {{ $comment->text }}
                        </div>
                        @auth
                        @if ($incident->user->id == auth()->user()->id )
                        <div>
                            <form action="{{ route('comments.edit', $comment) }}" method="GET" style="display: inline;">
                                @csrf
                                <button class="btn btn-primary btn-sm" type="submit">Editar</button>
                            </form>
                            <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro?')">Borrar</button>
                            </form>
                        </div>
                        @endif
                        @endauth
                    </li>
                @endif
            @empty
                <li class="list-group-item">Sin comentarios</li>
            @endforelse
        </ul>

        <!-- Formulario para agregar un comentario -->
        @auth
        <div class="mt-4">
            <h3>Agregar un Comentario</h3>
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="incident_id" value="{{ $incident->id }}">
                <div class="form-group">
                    <textarea name="content" id="content" rows="4" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Agregar Comentario</button>
            </form>
        </div>
        @endauth
    </div>
    @endauth
</div>
@endsection