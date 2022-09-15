@extends('admin.master')
@section('content')
    
    <div class="py-12">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-8">
                    <div class="card-group">
                        @foreach ($multiImage as $image)
                            <div class="col-md-3  m-2">
                                <div class="card">
                                    <img src="{{ asset($image->image) }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $multiImage->links() }}
                </div>
                <div class="col-md-4">
                      
                    <div class="card">
                      <div class="card-header">Multi-Image Add</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('multipleImage.store') }}" enctype="multipart/form-data">
                              @csrf
                
                                <div class="form-group">
                                  <label>Multi Image</label>
                                  <input type="file" name="image[]" multiple="" class="form-control @error('image') is-invalid @else is-valid @enderror"    placeholder="Enter multi Image" >
                                  @error('image')
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