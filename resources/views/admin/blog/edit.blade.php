@extends('admin.master')
@section('content')
<div class="py-12">
    <div class="container">
        
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-header">Edit blog</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('blog.update',$blog->id) }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ $blog->image }}"> 
                                <div class="mb-3">
                                    <label class="form-label"><b>About Title</b></label>
                                    <input type="text" value="{{ old('title', $blog->title) }}" placeholder="Enter blog title" class="form-control @error('title') is-invalid @else is-valid @enderror" name="title">
                                    @error('title')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Sort Description</b></label>
                                    <textarea type="text" placeholder="Enter Sort description" rows="2" class="form-control @error('sort_desc') is-invalid @else is-valid @enderror" name="sort_desc">{{ $blog->sort_desc }}</textarea>
                                    @error('sort_desc')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Sort Description</b></label>
                                    <textarea type="text" placeholder="Enter Long description" rows="3" class="form-control @error('long_desc') is-invalid @else is-valid @enderror" name="long_desc">{{ $blog->long_desc }}</textarea>
                                    @error('long_desc')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <img src="{{ asset($blog->image) }}" width="300px" height="200px">
                                    <label class="form-label"><b>Image</b></label>
                                    <input type="file" value="{{ old('image', $blog->image) }}" class="form-control @error('image') is-invalid @else is-valid @enderror" name="image">
                                    @error('image')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-outline-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
        </div>
    </div>
</div>
@endsection