@extends('layout.master')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="">Categories</h5>
        <a href="{{ route('category.create') }}" class="btn btn-dark">create</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td class="align-middle">{{ $category->title }}</td>
                        <td class="d-flex">
                            <a href="{{ route('category.update', ['id' => $category->id]) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <form action="{{ route('category.destroy', ['id' => $category->id]) }}" method="post">
                                @csrf
                                @method('Delete')
                                <button type="submit" href="{{ route('category.destroy', ['id' => $category->id]) }}" class="btn btn-sm btn-danger ms-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection