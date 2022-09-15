@extends('admin.master')
@section('content')
<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <form method="POST" action="{{ route('brand.update',$brand->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
                    <div class="mb-3">
                        <label class="form-label"><b>Category Name</b></label>
                        <input type="text"  class="form-control @error('brand_name') is-invalid @else is-valid @enderror" name="brand_name" value="{{ old('brand_name', $brand->brand_name) }}">
                        @error('brand_name')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <img src="{{ asset($brand->brand_image) }}" width="300px" height="200px">
                    <div class="mb-3">
                        <label class="form-label"><b>Brand Image</b></label>
                        <input type="file" class="form-control @error('brand_image') is-invalid @else is-valid @enderror" value="{{ old('brand_image', $brand->brand_image) }}" name="brand_image">
                        @error('brand_image')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>
@endsection