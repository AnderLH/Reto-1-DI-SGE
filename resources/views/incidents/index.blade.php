@extends('layouts.app')

@section('content')
<ul>
    {{--esto es un comentario: recorremos el listado de posts--}}
    @foreach ($incidents as $incident)
        {{-- visualizamos los atributos del objeto --}}
        <li>
            <div class="d-flex flex-row">
                <a href="{{route('incidents.show',$incident)}}"> {{$incident->title}}</a>. Escrito el {{$incident->created_at}}
                @auth
                <a class="btn btn-warning btn-sm" href="{{route('incidents.edit',$incident)}}" role="button">Editar</a>
                <form action="{{route('incidents.destroy',$incident)}}" method="POST"> @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                @endauth
            </div>
        </li>
    @endforeach
</ul>
@endsection