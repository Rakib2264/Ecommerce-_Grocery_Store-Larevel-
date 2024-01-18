@extends('backend.master')
@section('backend_content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-8">
            <div class="card shadow">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0 text-center">Add New Brand</h5>
                </div>
                <div class="card-body">
                    <form action="{{route("brand.store")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="categoryName">Brand Name</label>
                            <input type="text" class="form-control" id="categoryName" name="name" placeholder="Enter category name">
                        </div>
                        <div class="form-group">
                            <label for="categoryName">Image</label>
                            <input type="file" class="form-control" id="categoryName" name="image">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info mt-2">Add Brand</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
