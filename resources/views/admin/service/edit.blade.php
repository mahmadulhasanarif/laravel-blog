@extends('admin.master')
@section('content')
<div class="py-12">
    <div class="container">
        
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-header">Edit Service</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('service.update',$service->id) }}">
                                @csrf
                            
                                <div class="mb-3">
                                    <label class="form-label"><b>Service Title</b></label>
                                    <input type="text" placeholder="Enter Service title" value="{{ old('title', $service->title) }}" class="form-control @error('title') is-invalid @else is-valid @enderror" name="title">
                                    @error('title')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Service Icon</b></label>
                                    <input type="text" placeholder="Enter Service icon" value="{{ old('icon', $service->icon) }} class="form-control @error('icon') is-invalid @else is-valid @enderror" name="icon">
                                    @error('icon')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Description</b></label>
                                    <textarea type="text" rows="3" placeholder="Enter Service description" class="form-control @error('description') is-invalid @else is-valid @enderror" name="description">{{ $service->description }}</textarea>
                                    @error('description')
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