@extends('admin.master')
@section('content')
    <div class="py-12">
        <div class="container">
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
                                        <th scope="col">Brand NAME</th>
                                        <th scope="col">Brand Image</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col"><b>Action</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $brand)
                                        <tr>
                                        <th scope="row">{{ $brands->firstItem()+$loop->index }}</th>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td><img src="{{ asset($brand->brand_image) }}" height="60px" width="80px"></td>
                                        <td>{{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ url('brand/'.$brand->id.'/edit') }}">Edit</a>
                                            <a class="btn btn-danger" href="{{ url('brand/'.$brand->id) }}">Delete</a>
                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $brands->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                            <form method="POST" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                                @csrf
                            
                                <div class="mb-3">
                                    <label class="form-label"><b>Brand Name</b></label>
                                    <input type="text" class="form-control @error('brand_name') is-invalid @else is-valid @enderror" name="brand_name">
                                    @error('brand_name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Brand Image</b></label>
                                    <input type="file" class="form-control @error('brand_image') is-invalid @else is-valid @enderror" name="brand_image">
                                    @error('brand_image')
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