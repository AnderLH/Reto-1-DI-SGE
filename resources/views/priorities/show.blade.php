@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{$priority->name}}</h1>
    <p>Creado el {{$priority->created_at}}</p>
</div>
@endsection
