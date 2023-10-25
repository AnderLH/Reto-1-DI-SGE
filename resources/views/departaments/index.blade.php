@extends('layouts.app')

@section('content')
<ul>
    {{--esto es un comentario: recorremos el listado de posts--}}
    @foreach ($departaments as $departament)
        {{-- visualizamos los atributos del objeto --}}
        <li>
            <div class="d-flex flex-row">
                <a href="{{route('departaments.show',$departament)}}"> {{$departament->name}}</a>. Escrito el {{$departament->created_at}}
                @auth
                <a class="btn btn-warning btn-sm" href="{{route('departaments.edit',$departament)}}" role="button">Editar</a>
                <form action="{{route('departaments.destroy',$departament)}}" method="POST"> @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                @endauth
            </div>
        </li>
    @endforeach
</ul>
@endsection