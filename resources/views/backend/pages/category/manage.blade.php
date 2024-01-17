@extends('backend.master')
@section('backend_content')
<div class="container-fluid mt-5">
    <h3 class=" text-center ">Manage Table</h3>
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
            @foreach ($categoryes as $category)
            <tr>
                <td>{{$sl}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}</td>
                <td>

                    <button class="btn btn-sm btn-secondary"><i class="fa-regular fa-pen-to-square fa-beat"></i></button>
                    <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash fa-beat"></i></button>

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
