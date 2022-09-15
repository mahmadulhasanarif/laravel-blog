@extends('admin.master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="card mt-4">
                <div class="card-header"><a style="float: right" href="{{ route('about.create') }}" class="btn btn-primary">Add Abouts</a></div>
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
                                <th scope="col" width="25%">Sort Desc</th>
                                <th scope="col" width="35%">Long Desc</th>
                                <th scope="col" width="15%"><b>Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($abouts as $about)
                                <tr>
                                <th scope="row">{{ $abouts->firstItem()+$loop->index }}</th>
                                <td>{{ $about->title }}</td>
                                <td>{{ $about->sort_desc }}</td>
                                <td>{{ $about->long_desc }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('about.edit',$about->id) }}">Edit</a>
                                    <a class="btn btn-danger"  href="{{ route('about.delete',$about->id) }}">Delete</a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $abouts->links() }}
                </div>
            </div>
        </div>
    </div>
         
@endsection