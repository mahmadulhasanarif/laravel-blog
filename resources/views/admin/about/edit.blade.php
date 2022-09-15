@extends('admin.master')
@section('content')
<div class="py-12">
    <div class="container">
        
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-header">Edit about</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('about.update',$about->id) }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label"><b>About Title</b></label>
                                    <input type="text" value="{{ old('title', $about->title) }}" placeholder="Enter about title" class="form-control @error('title') is-invalid @else is-valid @enderror" name="title">
                                    @error('title')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Sort Description</b></label>
                                    <textarea type="text" placeholder="Enter Sort description" rows="2" class="form-control @error('sort_desc') is-invalid @else is-valid @enderror" name="sort_desc">{{ $about->sort_desc }}</textarea>
                                    @error('sort_desc')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Sort Description</b></label>
                                    <textarea type="text" placeholder="Enter Long description" rows="3" class="form-control @error('long_desc') is-invalid @else is-valid @enderror" name="long_desc">{{ $about->long_desc }}</textarea>
                                    @error('long_desc')
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