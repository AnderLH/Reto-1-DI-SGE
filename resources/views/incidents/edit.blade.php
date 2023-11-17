@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-4" name="update_incident" action="{{ route('incidents.update', $incident) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" required value="{{ $incident->title }}"/>
        </div>

        <div class="mb-3">
            <label for="text" class="form-label">Texto</label>
            <textarea class="form-control" id="text" name="text" rows="4" required>{{ $incident->text }}</textarea>
        </div>

        <div class="row mb-3">
            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
            <div class="col-md-6">
                <select id="status" class="form-select" name="status" required>
                    <option value="" disabled>Select a status</option>
                    @foreach ($statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="priority" class="col-md-4 col-form-label text-md-end">{{ __('Priority') }}</label>
            <div class="col-md-6">
                <select id="priority" class="form-select" name="priority" required>
                    <option value="" disabled>Select a priority</option>
                    @foreach ($priorities as $priority)
                        <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>
            <div class="col-md-6">
                <select id="category" class="form-select" name="category" required>
                    <option value="" disabled>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="minutes" class="form-label">Minutos</label>
            <input type="number" class="form-control" id="minutes" name="minutes" required value="{{ $incident->minutes }}"/>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</div>
@endsection
