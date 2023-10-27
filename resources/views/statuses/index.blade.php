@extends('layouts.app')

@section('content')
<ul>
    {{--esto es un comentario: recorremos el listado de posts--}}
    @foreach ($statuses as $status)
        {{-- visualizamos los atributos del objeto --}}
        <li>
            <div class="d-flex flex-row">
                <a href="{{route('statuses.show',$status)}}"> {{$status->name}}</a>. Escrito el {{$status->created_at}}
                @auth
                <a class="btn btn-warning btn-sm" href="{{route('statuses.edit',$status)}}" role="button">Editar</a>
                <form action="{{route('statuses.destroy',$status)}}" method="POST"> @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                @endauth
            </div>
        </li>
    @endforeach
</ul>
@endsection