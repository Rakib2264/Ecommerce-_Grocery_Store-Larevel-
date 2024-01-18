@extends('backend.master')
@section('backend_content')
<div class="container-fluid mt-5">
    <h3 class=" text-center">Sub_Category Manage Table</h3>
    <table id="myTable" class="table table-striped table-bordered">
        <thead class="table-info">
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $sl = 1;
            @endphp
            @foreach ($subcategoryes as $subcategory)
            <tr class="text-center">
                <td>{{$sl}}</td>
                <td>{{$subcategory->name}}</td>
                <td>{{$subcategory->slug}}</td>
                <td>{{$subcategory->cats->name}}</td>
                <td>
                    <a href="{{route('subcategory.edit',$subcategory->id)}}" class="btn btn-sm btn-secondary"><i class="fa-regular fa-pen-to-square fa-beat"></i></a>
                    <a href="{{route('subcategory.delete',$subcategory->id)}}" onclick="return confirm('Are you sure want to delete this sub_category?');" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash fa-beat"></i></a>

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
