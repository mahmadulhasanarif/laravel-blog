@extends('admin.master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="card mt-4">
                <div class="card-header"><a style="float: right" href="{{ route('contact.create') }}" class="btn btn-primary">Add Service</a></div>
                <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success " role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col" width="10%" scope="col">SL NO</th>
                                <th scope="col" width="20%">Address</th>
                                <th scope="col" width="20%">Email</th>
                                <th scope="col" width="20%">Phone</th>
                                <th scope="col" width="15%">Created at</th>
                                <th scope="col" width="15%"><b>Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $contact->address }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{Carbon\Carbon::parse( $contact->created_at )->diffForHumans()}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('contact.edit',$contact->id) }}">Edit</a>
                                    <a class="btn btn-danger"  href="{{ route('contact.delete',$contact->id) }}">Delete</a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
         
@endsection