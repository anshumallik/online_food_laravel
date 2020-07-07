@extends('admin.layouts.app')
@section('page-name','edit-user')
@section('user','active')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Vendor</h1>
                </div>

            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Edit Vendor
                            </h3>
                        </div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{route('vendors.update',$vendor->id)}}" method="POST">
                            @csrf
                        <div class="card-body">

                            <div class="form-group">

                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" value="{{$user->name}}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" name="email" class="form-control" value="{{$user->email}}">
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control" value="{{$user->password}}">
                            </div>

                            <div class="form-group">
                                <label for="country">Country:</label>
                                <input type="text" name="country" class="form-control" value="{{$vendor->country}}">
                            </div>

                            <div class="form-group">
                                <label for="country">City:</label>
                                <input type="text" name="city" class="form-control" value="{{$vendor->city}}">
                            </div>
                            <div class="form-group">
                                <label for="zip">Zip:</label>
                                <input type="text" name="zip" class="form-control" value="{{$vendor->zip}}">
                            </div>
                            <div class="form-group">
                                <label for="image">Logo:</label>
                                <input type="file" class="form-control" name="logo" id="exampleInputFile">
                                <img class="float-left" src="{{asset('images/vendor/'.$vendor->logo)}}" alt=""
                                     style="width: 50px; margin-top: 10px;">

                            </div>
                        </div>
                        <div class="form-group text-center">
                            <a class="btn btn-primary btn-sm" href="{{ route('vendors.index') }}"> Back</a>

                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection