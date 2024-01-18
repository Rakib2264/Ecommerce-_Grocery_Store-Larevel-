@extends('backend.master')
@section('backend_content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-10">
                <div class="card shadow">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0 text-center">Edit Product</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="categoryName">Category Name</label>
                                <select name="cat_id" class="form-select">
                                    <option selected disabled>------Select Category------</option>
                                    @foreach ($categories as $category)
                                     <option value="{{$category->id}}" {{$product->id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="categoryName">Sub_Category Name</label>
                                <select name="subcat_id" class="form-select">
                                    <option selected disabled>------Select Sub_Category------</option>
                                    @foreach ($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}" {{$product->id == $subcategory->id ? 'selected' : ''}}>{{$subcategory->name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="categoryName">Brand Name</label>
                                <select name="brand_id" class="form-select">
                                    <option selected disabled>------Select Brand------</option>
                                    @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}" {{$product->id == $brand->id ? 'selected' : ''}}>{{$brand->name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="categoryName">Name</label>
                                <input type="text" class="form-control" value="{{$product->name}}" id="categoryName" name="name" placeholder="Enter subcategory name">
                            </div>
                            <div class="form-group">
                                <label for="categoryName">Buy Price</label>
                                <input type="text" class="form-control" id="categoryName" value="{{$product->buy_price}}" name="buy_price" placeholder="Buy Price">
                            </div>
                            <div class="form-group">
                                <label for="categoryName">Sale Price</label>
                                <input type="text" class="form-control" id="categoryName" value="{{$product->sale_price}}" name="sale_price" placeholder="Sale Price">
                            </div>
                            <div class="form-group">
                                <label for="categoryName">Short Description</label>
                                <textarea name="short_des" class="form-control"  cols="5" rows="3">{{$product->short_des}}</textarea>                            </div>
                            <div class="form-group">
                                <label for="categoryName">Long Description</label>
                                <textarea id="summernote" name="long_des" class="form-control" cols="10" rows="5">{{$product->long_des}}</textarea>                            </div>
                            <div class="form-group">
                                <label for="categoryName">Product Image</label>
                                <input type="file" class="form-control" id="categoryName" name="image">
                                <img height="60px" class=" img-thumbnail mt-2" width="60px" src="{{asset("product/".$product->image)}}"  alt="">
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="hot_offer" type="checkbox" value="1" id="flexSwitchCheckHotOffer" {{ $product->hot_offer ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexSwitchCheckHotOffer">Hot Offer</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" value="1" name="special_offer" id="flexSwitchCheckSpecialOffer" {{ $product->special_offer ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexSwitchCheckSpecialOffer">Special Offer</label>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-info mt-4">Update Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
