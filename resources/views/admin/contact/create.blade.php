@extends('admin.master')
@section('content')
<div class="py-12">
    <div class="container">
        
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-header">Add Contact</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('contact.store') }}">
                                @csrf
                            
                                <div class="mb-3">
                                    <label class="form-label"><b>Address</b></label>
                                    <input type="text" placeholder="Enter Address" class="form-control @error('address') is-invalid @else is-valid @enderror" name="address">
                                    @error('address')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Email</b></label>
                                    <input type="text" placeholder="Enter Your Email" class="form-control @error('email') is-invalid @else is-valid @enderror" name="email">
                                    @error('email')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>phone</b></label>
                                    <input type="text" placeholder="Enter Your phone number" class="form-control @error('phone') is-invalid @else is-valid @enderror" name="phone">
                                    @error('phone')
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
