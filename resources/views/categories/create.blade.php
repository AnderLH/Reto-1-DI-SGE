@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="create_platform" action="{{route('categories.store')}}" method="POST"
        enctype="multipart/form-data"> @csrf <div class="form-group mb-3"> <label for="titulo"
        class="form-label">Nombre de Categoria</label> <input type="text" class="form-control" id="titulo" name="titulo" required />
</div>


<button type="submit" class="btn btn-primary" name="">Crear</button>
</form>
</div>
@endsection