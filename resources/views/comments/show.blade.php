@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{$comment->comment}}</h1>
    <p>Creado el {{$comment->created_at}}</p>
</div>
@endsection
