@extends('admin.master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="card mt-4">
                <div class="card-header"><a style="float: right" href="{{ route('slider.create') }}" class="btn btn-primary">Add Slider</a></div>
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
                                <th scope="col" width="20%">Title</th>
                                <th scope="col" width="30%">Description</th>
                                <th scope="col" width="15%">Image</th>
                                <th scope="col" width="10%">Created At</th>
                                <th scope="col" width="15%"><b>Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                <tr>
                                <th scope="row">{{ $sliders->firstItem()+$loop->index }}</th>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->description }}</td>
                                <td><img src="{{ asset($slider->image) }}" height="60px" width="80px"></td>
                                <td>{{ Carbon\Carbon::parse($slider->created_at)->diffForHumans() }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('slider.edit',$slider->id) }}">Edit</a>
                                    <a class="btn btn-danger"  href="{{ route('slider.delete',$slider->id) }}">Delete</a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $sliders->links() }}
                </div>
            </div>
        </div>
    </div>
         
@endsection