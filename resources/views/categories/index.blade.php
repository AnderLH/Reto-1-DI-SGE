@extends('layouts.app')
@section('content')
<ul>
    {{--esto es un comentario: recorremos el listado de posts--}}
    @foreach ($categories as $category)
    {{-- visualizamos los atributos del objeto --}}
    <li class="pt-1">
        <div class="d-flex flex-row">
            <a href="{{route('categories.show',$category)}}"> {{$category->name}}</a>. Escrito el {{$category->created_at}}
            @auth
            <a class="btn btn-warning btn-sm" href="{{route('categories.edit',$category)}}" role="button">Editar</a>
            <form action="{{route('categories.destroy',$category)}}" method="POST"> @csrf @method('DELETE') 
                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
            @endauth
        </div> 
    </li> 
    @endforeach 
</ul>
@endsection