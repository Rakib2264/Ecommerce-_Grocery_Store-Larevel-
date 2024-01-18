@extends('backend.master')
@section('backend_content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-8">
            <div class="card shadow">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0 text-center">Edit Brand</h5>
                </div>
                <div class="card-body">
                    <form action="{{route("brand.update",$brand->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="categoryName">Brand Name</label>
                            <input type="text" class="form-control" value="{{$brand->name}}" id="categoryName" name="name" placeholder="Enter brand name">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info mt-2">Update Brand</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
