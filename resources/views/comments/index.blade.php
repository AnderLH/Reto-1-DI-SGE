@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Comentarios</h1>

    <ul class="list-group">
        @forelse ($comments as $comment)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0"><a href="{{ route('comments.show', $comment) }}">{{ $comment->text }}</a></h5>
                    <p class="text-muted">Escrito el {{ $comment->created_at }}</p>
                    <p>Usuario: {{ $comment->user->name }}</p> <!-- Acceder al nombre del usuario -->
                </div>
                @auth
                <div>
                    <a href="{{ route('comments.edit', $comment) }}" class="btn btn-warning btn-sm" role="button">Editar</a>
                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </div>
                @endauth
            </div>
        </li>
        @empty
        <li class="list-group-item">No hay comentarios disponibles.</li>
        @endforelse
    </ul>
</div>
@endsection
