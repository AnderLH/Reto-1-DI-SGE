@extends('layouts.app')
@section('content')
<ul>
    {{--esto es un comentario: recorremos el listado de posts--}}
    @foreach ($priorities as $priority)
        {{-- visualizamos los atributos del objeto --}}
        <li class="pt-1">
            <div class="d-flex flex-row">
                <a href="{{route('priorities.show',$priority)}}"> {{$priority->name}}</a>. Escrito el {{$priority->created_at}}
                @auth
                <a class="btn btn-warning btn-sm" href="{{route('priorities.edit',$priority)}}" role="button">Editar</a>
                <form action="{{route('priorities.destroy',$priority)}}" method="POST"> @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                @endauth
            </div>
        </li>
    @endforeach
</ul>
@endsection