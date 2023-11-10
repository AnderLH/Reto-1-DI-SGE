@extends('layouts.app')

@section('content')
<div class="container">
    <form class="mt-2" name="edit_comment" action="{{ route('comments.update', $comment) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="text" class="form-label">Antiguo Texto:</label>
            <p>{{ $comment->text }}</p>
        </div>
        <div class="form-group mb-3">
            <label for="new_text" class="form-label">Nuevo Texto:</label>
            <textarea class="form-control" id="new_text" name="new_text" required>{{ $comment->text }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection

