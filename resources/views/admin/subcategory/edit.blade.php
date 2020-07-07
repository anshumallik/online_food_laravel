@extends('admin.layouts.app')
@section('page-name', 'Category-edit')
@section('category', 'active')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Edit Category</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content" style="margin-left: 0px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Category</h3>
                        </div>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <p><strong>Opps Something went wrong</strong></p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success" style="background-color: #0E9A00">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <form action="{{route('subcategories.update', $subcategory->id)}}" role="form" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Category</label>
                                    <select name="category_id" id="" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">SubCategory Name</label>
                                    <input type="text" name="name" value="{{$subcategory->name}}" class="form-control"
                                           id="category_name"
                                           placeholder="Enter Category Name">

                                </div>
                                <div class="form-group">
                                    <strong>Description:</strong>
                                    <input type="text" name="description" value="{{ $subcategory->description }}"
                                           class="form-control"
                                           placeholder="Description">
                                </div>
                                <div class="form-group">
                                    <label for="image">Choose Image:</label>
                                    <input type="file" class="form-control" name="image" id="exampleInputFile">
                                    <img class="float-left" src="{{asset('images/subcategory/'.$subcategory->image)}}"
                                         alt=""
                                         style="width: 50px; margin-top: 10px;">

                                </div>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-primary btn-sm" href="{{ route('subcategories.index') }}"> Back</a>
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection