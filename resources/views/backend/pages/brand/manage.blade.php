@extends('backend.master')
@section('backend_content')
<div class="container-fluid mt-5">
    <h3 class=" text-center">Category Manage Table</h3>
    <table id="myTable" class="table table-striped table-bordered">
        <thead class="table-info">
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $sl = 1;
            @endphp
            @foreach ($brands as $brand)
            <tr class="text-center">
                <td>{{$sl}}</td>
                <td>{{$brand->name}}</td>
                <td>{{$brand->slug}}</td>
                <td>
                    <a href="{{route('brand.edit',$brand->id)}}" class="btn btn-sm btn-secondary"><i class="fa-regular fa-pen-to-square fa-beat"></i></a>
                    <a href="{{route('brand.delete',$brand->id)}}" onclick="return confirm('Are you sure want to delete this brand?');" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash fa-beat"></i></a>

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
