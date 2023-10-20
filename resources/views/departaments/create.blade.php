@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Departamento</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('departamentos.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre del Departamento</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <!-- Puedes agregar más campos aquí si es necesario -->

                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
