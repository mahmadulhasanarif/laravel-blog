@extends('admin.master')
@section('content')
<div class="py-12">
    <div class="container mt-4">
        <a class="btn btn-primary" style="float: right" href="{{ route('trash.index') }}">Trash</a>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            @if (session('msg'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('msg') }}
                                </div>
                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">SL NO</th>
                                    <th scope="col">USER NAME</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col"><b>Action</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                    <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                    <td>{{ $category->user->name }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ url('category/'.$category->id.'/edit') }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ url('category/'.$category->id) }}">Delete</a>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                        <form method="POST" action="{{ route('category.store') }}">
                            @csrf
                        
                            <div class="mb-3">
                                <label class="form-label"><b>Category Name</b></label>
                                <input type="text" class="form-control @error('name') is-invalid @else is-valid @enderror" name="name">
                                @error('name')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection