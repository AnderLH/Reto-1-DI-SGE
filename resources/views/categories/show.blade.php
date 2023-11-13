@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $category->name }}</h1>
    <p>Creado el {{ $category->created_at }}</p>

    <h2>Incidencias de esta categoría:</h2>
    <ul class="list-group">
        @forelse ($category->incidents as $incident)
            @if ($incident->departament_id === auth()->user()->departament_id)
                <li class="list-group-item"><a href="{{ route('incidents.show', $incident) }}">{{ $incident->title }}</a></li>
            @endif
        @empty
            <p>No hay incidencias asociadas a esta categoría.</p>
        @endforelse
    </ul>
</div>
@endsection
