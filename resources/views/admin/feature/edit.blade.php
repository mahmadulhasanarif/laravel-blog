@extends('admin.master')
@section('content')
<div class="py-12">
    <div class="container">
        
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-header">Edit Feature</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('feature.update',$feature->id) }}">
                                @csrf
                            
                                <div class="mb-3">
                                    <label class="form-label"><b>feature Title</b></label>
                                    <input type="text" placeholder="Enter feature title" value="{{ old('title', $feature->title) }}" class="form-control @error('title') is-invalid @else is-valid @enderror" name="title">
                                    @error('title')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>feature Icon</b></label>
                                    <input type="text" placeholder="Enter feature icon" value="{{ old('icon', $feature->icon) }}" class="form-control @error('icon') is-invalid @else is-valid @enderror" name="icon">
                                    @error('icon')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Feature Color</b></label>
                                    <input type="text" placeholder="Enter feature color" value="{{ old('color', $feature->color) }}" class="form-control @error('color') is-invalid @else is-valid @enderror" name="color">
                                    @error('color')
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
