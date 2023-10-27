@extends('layouts.app')
@section('content')
<ul>
    {{--esto es un comentario: recorremos el listado de posts--}}
    @foreach ($coments as $coment)
    {{-- visualizamos los atributos del objeto --}}
    <li class="pt-1">
        <div class="d-flex flex-row">
            <a href="{{route('coments.show',$coment)}}"> {{$coment->coment}}</a>. Escrito el {{$coment->created_at}}
            @auth
            <a class="btn btn-warning btn-sm" href="{{route('coments.edit',$coment)}}" role="button">Editar</a>
            <form action="{{route('coments.destroy',$coment)}}" method="POST"> @csrf @method('DELETE') 
                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
            @endauth
        </div> 
    </li> 
    @endforeach 
</ul>
@endsection