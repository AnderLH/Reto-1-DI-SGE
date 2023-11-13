@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="create_platform" action="{{route('statuses.update',$status)}}" method="POST"
        enctype="multipart/form-data">
        @csrf 
        @method('PUT')
        <div class="form-group mb-3"> 
            <label for="titulo"
            class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{$status->name}}"/>
        </div>
        <button type="submit" class="btn btn-primary" name="">Actualizar</button>
    </form>
</div>
@endsection