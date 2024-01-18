@extends('backend.master')
@section('backend_content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-8">
            <div class="card shadow">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0 text-center">Edit Category</h5>
                </div>
                <div class="card-body">
                    <form action="{{route("subcategory.update",$subcategory->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="categoryName">Sub_Category Name</label>
                            <input type="text" class="form-control" value="{{$subcategory->name}}" id="categoryName" name="name" placeholder="Enter category name">
                        </div>
                        <div class="form-group">
                            <label for="categoryName">Category Name</label>
                            <select name="cat_id" class="form-select text-center">
                                <option>{{$subcategory->cats->name}}</option>
                             @foreach ($categoryes as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info mt-2">Update Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
