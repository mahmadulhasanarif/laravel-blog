@extends('admin.master')
@section('content')


<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
                                    @foreach ($trastIndex as $category)
                                    <tr>
                                    <th scope="row">{{ $trastIndex->firstItem()+$loop->index }}</th>
                                    <td>{{ $category->user->name }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ url('category/restore/'.$category->id) }}">Restore</a>
                                        <a class="btn btn-danger" href="{{ url('category/delete/'.$category->id) }}">Delete</a>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $trastIndex->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection