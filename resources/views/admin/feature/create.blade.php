@extends('admin.master')
@section('content')
<div class="py-12">
    <div class="container">
        
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-header">Add Feature</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('feature.store') }}">
                                @csrf
                            
                                <div class="mb-3">
                                    <label class="form-label"><b>feature Title</b></label>
                                    <input type="text" placeholder="Enter feature title" class="form-control @error('title') is-invalid @else is-valid @enderror" name="title">
                                    @error('title')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Service Icon</b></label>
                                    <input type="text" placeholder="Enter Service icon" class="form-control @error('icon') is-invalid @else is-valid @enderror" name="icon">
                                    @error('icon')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Feature color</b></label>
                                    <input type="text" placeholder="Enter feature color" class="form-control @error('color') is-invalid @else is-valid @enderror" name="color">
                                    @error('color')
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