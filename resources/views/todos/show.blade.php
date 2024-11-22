@extends('layout.master')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Todo</h5>
            <a href="{{route('todo')}}" class="btn btn-dark">back</a>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <img width="230" class="rounded" src="{{ asset('images/' . $id->image) }}" alt="">
            </div>
            <div class="row">
                <div class="col-12 col-md-4 mb-3">
                    <label class="form-label">Title</label>
                    <input disabled type="text" value="{{ $id->title }}" class="form-control">
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label class="form-label">Category</label>
                    <input disabled type="text" value="{{ $id->category->title }}" class="form-control">
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label class="form-label">Status</label>
                    <input disabled type="text" value="{{ $id->status ? 'completed' : 'doing...' }}" class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea disabled class="form-control" name="description" rows="3">{{ $id->description }}</textarea>
            </div>
            <div class="d-flex">
                <a href="{{ route('todo.edit', ['id' => $id->id]) }}" class="btn btn-secondary">Edit</a>
                <form action="{{ route('todo.destroy', ['id' => $id->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger ms-2">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection