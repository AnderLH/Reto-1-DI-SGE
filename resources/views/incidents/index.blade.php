@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<script type="module" src="{{ mix('js/changePageMode.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <h1 class="text-center">Lista de Incidencias</h1>
    <ul class="list-group">
    @auth
        <a href="{{ route('incidents.create') }}" class="btn btn-success" role="button">Crear Incidencias</a>
        @endauth
    <div class="column">
        <ul class="list-group">
            <li class="list-group-item">
            <div class="row">
                @foreach ($statuses as $status_id)
                @if ($status_id->incidents->count() > 0) <!-- Verificar si hay incidencias -->
                <div class="col-md-4">
                    <h2 class="text-center">{{ $status_id->name }}</h2>
                    <ul class="list-group">
                        @foreach ($status_id->incidents->sortBy('priority.id') as $incident)
                        @auth
                            @if ($incident->departament_id == auth()->user()->departament_id)
                                <div class="list-group-item-container">
                                    <div class="center-content">
                                        <a id="incident-title" href="{{ route('incidents.show', $incident) }}">{{ $incident->title }}</a>
                                        <li class="list-group-item text-center">
                                            <p>{{ $incident->text }}</p>
                                            <p>Creado por {{ $incident->user->name }}</p>
                                            <div class="list-group">
                                                <a href="{{ route('statuses.show', $incident->status) }}" class="list-group-item list-group-item-action">
                                                    <p>Estado:</p>    
                                                    {{ $incident->status->name }}
                                                </a>
                                                <a href="{{ route('priorities.show', $incident->priority) }}" class="list-group-item list-group-item-action">
                                                    <p>Prioridad:</p>
                                                    {{ $incident->priority->name }}
                                                </a>
                                                <a href="{{ route('categories.show', $incident->category) }}" class="list-group-item list-group-item-action">
                                                    <p>Categoría:</p>
                                                    {{ $incident->category->name }}
                                                </a>
                                            </div>
                                            <p>Escrito el {{ $incident->created_at }}</p>
                                            @if ($incident->created_at == $incident->updated_at)
                                                <p>No ha habido cambios desde la creación.</p>
                                            @elseif ($incident->updated_at == null)
                                                <p>No ha habido cambios desde la creación.</p>
                                            @else
                                                <p>Última actualización: {{ $incident->updated_at }}</p>
                                            @endif
                                        </li>
                                        @auth
                                        @if ($incident->user_id == auth()->user()->id)
                                            <div class="button-container">
                                                <a class="btn btn-warning btn-sm" href="{{ route('incidents.edit', $incident) }}" role="button">Editar</a>
                                                <form action="{{ route('incidents.destroy', $incident) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                                </form>
                                            </div>
                                        @endif
                                        @endauth
                                    </div>
                                </div>
                            @endif
                        @else
                            <li class="list-group-item">
                                <a href="{{ route('incidents.show', $incident) }}">{{ $incident->title }}</a>
                                <p>{{ $incident->text }}</p>
                                <p>Creado por {{ $incident->user->name }}</p>
                                <div class="list-group">
                                    <a href="{{ route('statuses.show', $incident->status) }}" class="list-group-item list-group-item-action">
                                        <p>Estado:</p>    
                                        {{ $incident->status->name }}
                                    </a>
                                    <a href="{{ route('priorities.show', $incident->priority) }}" class="list-group-item list-group-item-action">
                                        <p>Prioridad:</p>
                                        {{ $incident->priority->name }}
                                    </a>
                                    <a href="{{ route('categories.show', $incident->category) }}" class="list-group-item list-group-item-action">
                                        <p>Categoría:</p>
                                        {{ $incident->category->name }}
                                    </a>
                                </div>
                                <p>Escrito el {{ $incident->created_at }}</p>
                                @if ($incident->created_at == $incident->updated_at)
                                                <p>No ha habido cambios desde la creación.</p>
                                            @elseif ($incident->updated_at == null)
                                                <p>No ha habido cambios desde la creación.</p>
                                            @else
                                                <p>Última actualización: {{ $incident->updated_at }}</p>
                                            @endif
                            </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                @else
                    <div class="col-md-4">
                        <h2 class="text-center">{{ $status_id->name }}</h2>
                        <p class="text-center">No hay incidencias en este estado.</p>
                    </div>
                @endif
                @endforeach
            </div>
            </li>
        </ul>
    </div>
</div>
@endsection