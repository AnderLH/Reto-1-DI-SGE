@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{$incident->title}}</h1>
    <p>Creado el {{$incident->created_at}}</p>
</div>
@endsection
