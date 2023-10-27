@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{$coment->coment}}</h1>
    <p>Creado el {{$coment->created_at}}</p>
</div>
@endsection
