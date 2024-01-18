@extends('backend.master')
@section('backend_content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-10">
                <div class="card shadow">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0 text-center">Add New Product</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="categoryName">Category Name</label>
                                <select name="cat_id" class="form-select">
                                    <option selected disabled>------Select Category------</option>
                                    @foreach ($categories as $category)
                                     <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="categoryName">Sub_Category Name</label>
                                <select name="subcat_id" class="form-select">
                                    <option selected disabled>------Select Sub_Category------</option>
                                    @foreach ($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="categoryName">Brand Name</label>
                                <select name="brand_id" class="form-select">
                                    <option selected disabled>------Select Brand------</option>
                                    @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="categoryName">Name</label>
                                <input type="text" class="form-control" id="categoryName" name="name" placeholder="Enter subcategory name">
                            </div>
                            <div class="form-group">
                                <label for="categoryName">Buy Price</label>
                                <input type="text" class="form-control" id="categoryName" name="buy_price" placeholder="Buy Price">
                            </div>
                            <div class="form-group">
                                <label for="categoryName">Sale Price</label>
                                <input type="text" class="form-control" id="categoryName" name="sale_price" placeholder="Sale Price">
                            </div>
                            <div class="form-group">
                                <label for="categoryName">Short Description</label>
                                <textarea name="short_des" class="form-control"  cols="5" rows="3"></textarea>                            </div>
                            <div class="form-group">
                                <label for="categoryName">Long Description</label>
                                <textarea id="summernote" name="long_des" class="form-control" cols="10" rows="5"></textarea>                            </div>
                            <div class="form-group">
                                <label for="categoryName">Product Image</label>
                                <input type="file" class="form-control" id="categoryName" name="image">
                            </div>
                               <div class="row mt-3" >
                                <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="hot_offer" type="checkbox" id="flexSwitchCheckChecked" checked>
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Hot Offer</label>
                                      </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="special_offer" id="flexSwitchCheckChecked" checked>
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Special Offer</label>
                                      </div>
                                </div>
                               </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info mt-4">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
