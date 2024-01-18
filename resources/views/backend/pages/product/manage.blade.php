@extends('backend.master')
@section('backend_content')
<div class="container-fluid mt-5">
    <h3 class=" text-center">Product Manage Table</h3>
    <table id="myTable" class="table table-striped table-bordered">
        <thead class="table-info">
            <tr>
                <th>SL</th>
                <th>Product</th>
                <th>Price</th>
                <th>Category/SubCategory/Brand</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $sl = 1;
            @endphp
            @foreach ($products as $product)
            <tr class="text-center">
                <td>{{$sl}}</td>
                <td>
                   <img height="100px" width="100px" src="{{asset("product/".$product->image)}}" alt=""><br/>
                   <small>Name: {{$product->name}}</small>
                </td>
                <td>
                    <small>Buy Price: {{$product->buy_price}}</small>
                    <hr>
                    <small>Sale Price: {{$product->sale_price}}</strong>
                </td>
                <td>
                    <small>Category: {{$product->cats->name}}</small>
                    <hr>
                    <small>SubCategory: {{$product->subcats->name}}</small>
                    <hr>
                    <small>Brand: {{$product->brands->name}}</small>
                </td>
                <td>
                    <a href="{{route('product.edit',$product->id)}}" class="btn btn-sm btn-secondary"><i class="fa-regular fa-pen-to-square fa-beat"></i></a>
                    <a href="{{route('product.delete',$product->id)}}" onclick="return confirm('Are you sure want to delete this product?');" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash fa-beat"></i></a>

                </td>
            </tr>
            @php
            $sl++
            @endphp
            @endforeach
        </tbody>
    </table>
</div>
@endsection
