@extends('admin.master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="card mt-4">
                <div class="card-header"><a style="float: right" href="{{ route('blog.create') }}" class="btn btn-primary">Add Blog</a></div>
                <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success " role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col" width="10%" scope="col">SL NO</th>
                                <th scope="col" width="15%">Title</th>
                                <th scope="col" width="15%">Sort Desc</th>
                                <th scope="col" width="25%">Long Desc</th>
                                <th scope="col" width="20%">Image</th>
                                <th scope="col" width="15%"><b>Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                <tr>
                                <th scope="row">{{ $blogs->firstItem()+$loop->index }}</th>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->sort_desc }}</td>
                                <td>{{ $blog->long_desc }}</td>
                                <td><img src="{{ asset($blog->image) }}" width="120px" height="100px"></td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('blog.edit',$blog->id) }}">Edit</a>
                                    <a class="btn btn-danger"  href="{{ route('blog.delete',$blog->id) }}">Delete</a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>
         
@endsection