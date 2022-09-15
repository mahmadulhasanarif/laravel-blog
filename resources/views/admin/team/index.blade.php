@extends('admin.master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="card mt-4">
                <div class="card-header"><a style="float: right" href="{{ route('team.create') }}" class="btn btn-primary">Add Member</a></div>
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
                                <th scope="col" width="15%">Title</th>
                                <th scope="col" width="25%">Description</th>
                                <th scope="col" width="15%">Image</th>
                                <th scope="col" width="10%">Created at</th>
                                <th scope="col" width="15%"><b>Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team)
                                <tr>
                                <th scope="row">{{ $teams->firstItem()+$loop->index }}</th>
                                <td>{{ $team->name }}</td>
                                <td>{{ $team->title }}</td>
                                <td>{{ $team->description }}</td>
                                <td><img src="{{ asset($team->image) }}" width="120px" height="100px"></td>
                                <td>{{Carbon\Carbon::parse( $team->created_at )->diffForHumans()}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('team.edit',$team->id) }}">Edit</a>
                                    <a class="btn btn-danger"  href="{{ route('team.destroy',$team->id) }}">Delete</a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $teams->links() }}
                </div>
            </div>
        </div>
    </div>
         
@endsection