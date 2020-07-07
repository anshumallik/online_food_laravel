@extends('admin.layouts.app')
@section('page-name', 'Category')
@section('category', 'active')
@section('content')
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        #outer {
            width: 100%;
            text-align: center;
        }

        .inner {
            display: inline-block;

        }
    </style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Category</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content" style="margin-left: 10px;">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <a href="{{route('categories.create')}}" class="btn btn-success float-right btn-sm"><i
                                    class="fa fa-plus-circle"></i> Add Category</a>

                    </div>
                    <div class="card-body">
                        <table id="category" class="table">
                            <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                @foreach($category->subcategories as $subcategory)
                                    <tr>
                                        <td>{{++$id}}</td>
                                        <td>
                                            {{$category->name}}
                                            <ul>
                                                <li>{{$subcategory->name}}</li>
                                            </ul>

                                        </td>
                                        <td>{{$category->description}}</td>
                                        <td>
                                            <img src="{{asset('images/category/'.$category->image)}}"
                                                 alt="Category Image"
                                                 style="width: 20px">
                                        </td>
                                        <td>
                                            <div id="outer">
                                                <a href="{{route('categories.edit', $category->id)}}"
                                                   class="btn btn-sm inner"
                                                   style="color: royalblue;"><i class="fa fa-edit" title="Edit"></i></a>
                                                <form action="{{route('categories.destroy', $category->id)}}"
                                                      method="POST"
                                                      class="inner">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm" style="color:red;"><i
                                                                class="fas fa-trash" title="Delete"></i></button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Sub Category</h3>
                </div>

            </div>
        </div>
    </section>
    <section class="content" style="margin-left: 10px;">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <a href="{{route('sub_cat_create')}}" class="btn btn-success float-right btn-sm mr-3"><i
                                    class="fa fa-plus-circle"></i> Add SubCategory</a>
                    </div>
                    <div class="card-body">
                        <table id="subcategory" class="table">
                            <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                @foreach($category->subcategories as $subcategory)
                                    <tr>
                                        <td>{{++$id}}</td>
                                        <td>{{$subcategory->name}}</td>
                                        <td>{{$subcategory->description}}</td>
                                        <td>
                                            <img src="{{asset('images/category/'.$subcategory->image)}}"
                                                 alt="Category Image"
                                                 style="width: 20px">
                                        </td>
                                        <td>
                                            <div id="outer">
                                                <a href="{{route('categories.edit', $subcategory->id)}}"
                                                   class="btn btn-sm inner"
                                                   style="color: royalblue;"><i class="fa fa-edit" title="Edit"></i></a>
                                                <form action="{{route('categories.destroy', $subcategory->id)}}"
                                                      method="POST" class="inner">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm" style="color:red;"><i
                                                                class="fas fa-trash" title="Delete"></i></button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Sub Category</h3>
                </div>

            </div>
        </div>
    </section>
    <section class="content" style="margin-left: 10px;">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <a href="{{route('sub_sub_cat_create')}}" class="btn btn-success float-right btn-sm mr-3"><i
                                    class="fa fa-plus-circle"></i> Add Sub SubCategory</a>
                    </div>
                    <div class="card-body">
                        <table id="subcategory" class="table">
                            <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                @foreach($category->subcategories as $subcategory)
                                    @foreach($category->sub_subcategories as $sub_subcategory)
                                    <tr>
                                        <td>{{++$id}}</td>
                                        <td>{{$sub_subcategory->name}}</td>
                                        <td>{{$sub_subcategory->description}}</td>
                                        <td>
                                            <img src="{{asset('images/category/'.$sub_subcategory->image)}}"
                                                 alt="Category Image"
                                                 style="width: 20px">
                                        </td>
                                        <td>
                                            <div id="outer">
                                                <a href="{{route('categories.edit', $sub_subcategory->id)}}"
                                                   class="btn btn-sm inner"
                                                   style="color: royalblue;"><i class="fa fa-edit" title="Edit"></i></a>
                                                <form action="{{route('categories.destroy', $sub_subcategory->id)}}"
                                                      method="POST" class="inner">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm" style="color:red;"><i
                                                                class="fas fa-trash" title="Delete"></i></button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>

                @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
        $("#subcategory").DataTable();
        $("#category").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    </script>


@endsection