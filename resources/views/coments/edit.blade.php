@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="create_platform" action="{{route('coments.update',$coment)}}" method="POST"
        enctype="multipart/form-data"> @csrf @method('PUT') <div class="form-group mb-3"> <label for="titulo"
        class="form-label">Titulo</label>
        <input type="text" class="form-control" id="titulo" name="titulo" required value="{{$coment->titulo}}"/> </div>
        <button type="submit" class="btn btn-primary" name="">Actualizar</button>
    </form>
</div>
@endsection