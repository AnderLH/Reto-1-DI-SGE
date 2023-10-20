@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{$departament->name}}</h1>
    <p>Creado el {{$departament->created_at}}</p>
</div>
@endsection
