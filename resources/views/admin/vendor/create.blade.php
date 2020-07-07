@extends('admin.layouts.app')
@section('page-name','Create-Vendor')
@section('vendor','active')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Create New Vendor</h3>
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
                        <form action="{{route('vendors.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name"> Name:</label>
                                <input type="text" name="name" class="form-control" placeholder="Name">

                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control" placeholder="password">
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">Confirm Password:</label>
                                <input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" class="form-control" name="phone" placeholder="phone">
                            </div>
                            <div class="form-group">
                                <label for="country">Country:</label>
                                <input type="text" class="form-control" name="country" placeholder="Country">
                            </div>
                            <div class="form-group">
                                <label for="city">City:</label>
                                <input type="text" class="form-control" name="city" placeholder="City">
                            </div>

                            <div class="form-group">
                                <label for="zip">Zip:</label>
                                <input type="text" class="form-control" name="zip" placeholder="Zip Code">
                            </div>
                            <div class="form-group">
                                <label for="logo">Logo:</label>
                                <input type="file" class="form-control" name="logo" placeholder="Logo">
                            </div>
                            <div class="form-group text-center">
                                <a class="btn btn-primary btn-sm" href="{{ route('vendors.index') }}"> Back</a>
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection