<x-app-layout>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form method="POST" action="{{ url('category/update/'.$category->id) }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label"><b>Category Name</b></label>
                            <input type="text"  class="form-control @error('name') is-invalid @else is-valid @enderror" name="name" value="{{ old('name', $category->name) }}">
                            @error('name')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
</x-app-layout>