@extends('admin.master')
@section('content')
<div class="py-12">
    <div class="container">
        
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-header">Add Slider</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('slider.update',$slider->id) }}" enctype="multipart/form-data">
                                @csrf
                            <input type="hidden" name="old_image" value="{{ $slider->image }}">
                                <div class="mb-3">
                                    <label class="form-label"><b>Slider Title</b></label>
                                    <input type="text" value="{{ old('title', $slider->title) }}" placeholder="Enter Slider title" class="form-control @error('title') is-invalid @else is-valid @enderror" name="title">
                                    @error('title')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Slider Description</b></label>
                                    <textarea type="text" placeholder="Enter Slider description" rows="3" class="form-control @error('description') is-invalid @else is-valid @enderror" name="description">{{ $slider->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <img src="{{ asset($slider->image) }}" alt="">
                                    <label class="form-label"><b>Slider Image</b></label>
                                    <input type="file" class="form-control @error('image') is-invalid @else is-valid @enderror" name="image">
                                    @error('image')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
        </div>
    </div>
</div>
@endsection