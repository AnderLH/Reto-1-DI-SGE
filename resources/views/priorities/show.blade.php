@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $priority->name }}</h1>
    <p>Creado el {{ $priority->created_at }}</p>

    <h2>Incidencias de este departamento:</h2>
    <ul class="list-group">
        @forelse ($priority->incidents as $incident)
            <li class="list-group-item"><a href="{{ route('incidents.show', $incident) }}">{{ $incident->title }}</a></li>
        @empty
            <p>No hay incidencias asociadas a este prioridad.</p>
        @endforelse
    </ul>
</div>
@endsection