@extends('admin.master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="card mt-4">
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
                                <th scope="col" width="10%">Name</th>
                                <th scope="col" width="15%">Email</th>
                                <th scope="col" width="15%">Subject</th>
                                <th scope="col" width="30%">Message</th>
                                <th scope="col" width="10%">Created at</th>
                                <th scope="col" width="10%"><b>Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contactFroms as $contactFrom)
                                <tr>
                                <th scope="row">{{ $contactFroms->firstItem()+$loop->index }}</th>
                                <td>{{ $contactFrom->name }}</td>
                                <td>{{ $contactFrom->email }}</td>
                                <td>{{ $contactFrom->subject }}</td>
                                <td>{{ $contactFrom->message }}</td>
                                <td>{{Carbon\Carbon::parse( $contactFrom->created_at )->diffForHumans()}}</td>
                                <td>
                                    <a class="btn btn-danger"  href="{{ route('message.delete',$contactFrom->id) }}">Delete</a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $contactFroms->links() }}
                </div>
            </div>
        </div>
    </div>
         
@endsection