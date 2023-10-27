@extends('layouts.app')

@section('content')

<div class="column">
    @foreach ($statuses as $status)
    <div class="col-md-4">
        <h2>{{ $status->name }}</h2>
        <ul>
            @foreach ($status->incidents as $incident)
                <li>
                    <a href="{{ route('incidents.show', $incident) }}">{{ $incident->title }}</a>
                    <a>{{$incident->text}}
                    <a>Creado por {{ $incident->user->name }}.</a>
                    <a>Escrito el {{ $incident->created_at }}</a>
                    @auth
                    <a class="btn btn-warning btn-sm" href="{{ route('incidents.edit', $incident) }}" role="button">Editar</a>
                    <form action="{{ route('incidents.destroy', $incident) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                    @endauth
                </li>
            @endforeach
        </ul>
    </div>
    @endforeach
</div>
@endsection
