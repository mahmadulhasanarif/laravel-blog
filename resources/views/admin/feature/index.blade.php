@extends('admin.master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="card mt-4">
                <div class="card-header"><a style="float: right" href="{{ route('feature.create') }}" class="btn btn-primary">Add Service</a></div>
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
                                <th scope="col" width="10%">Title</th>
                                <th scope="col" width="15%">Icon</th>
                                <th scope="col" width="35%">Color</th>
                                <th scope="col" width="15%">Created at</th>
                                <th scope="col" width="15%"><b>Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($features as $feature)
                                <tr>
                                <th scope="row">{{ $features->firstItem()+$loop->index }}</th>
                                <td>{{ $feature->title }}</td>
                                <td>{{ $feature->icon }}</td>
                                <td>{{ $feature->color }}</td>
                                <td>{{Carbon\Carbon::parse( $feature->created_at )->diffForHumans()}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('feature.edit',$feature->id) }}">Edit</a>
                                    <a class="btn btn-danger"  href="{{ route('feature.destroy',$feature->id) }}">Delete</a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $features->links() }}
                </div>
            </div>
        </div>
    </div>
         
@endsection