@extends('admin.master')
@section('content')
<div class="py-12">
    <div class="container">
        
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-header">Add blog</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                                @csrf
                            
                                <div class="mb-3">
                                    <label class="form-label"><b> Title</b></label>
                                    <input type="text" placeholder="Enter blog title" class="form-control @error('title') is-invalid @else is-valid @enderror" name="title">
                                    @error('title')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Sort Description</b></label>
                                    <textarea type="text" rows="2" placeholder="Enter Sort description" class="form-control @error('sort_desc') is-invalid @else is-valid @enderror" name="sort_desc"></textarea>
                                    @error('sort_desc')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Long Description</b></label>
                                    <textarea type="text" rows="3" placeholder="Enter Long description" class="form-control @error('long_desc') is-invalid @else is-valid @enderror" name="long_desc"></textarea>
                                    @error('long_desc')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Image</b></label>
                                    <input type="file"  class="form-control @error('image') is-invalid @else is-valid @enderror" name="image">
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