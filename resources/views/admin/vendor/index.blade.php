@extends('admin.layouts.app')
@section('page-name', 'Vendor')
@section('vendor', 'active')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  />--}}
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <style>
        #outer {
            width: 100%;
            text-align: center;
        }

        .inner {
            display: inline-block;

        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Vendors</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content" style="margin-left: 10px;">
        <div class="card">
            <div class="card-header">
                <a href="{{route('vendors.create')}}" class="btn btn-success float-right btn-sm"><i
                            class="fa fa-plus-circle"></i> Add New Vendor</a>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table id="user" class="table user">
                    <thead>
                    <tr>
                        <th>Sn</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Zip</th>
                        <th>Status</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($vendors as $vendor)
                        <tr>
                            <td>{{ ++$id }}</td>
                            <td>{{ $vendor->user['name'] }}</td>
                            <td>{{ $vendor->user['email'] }}</td>
                            <td>{{ $vendor->country }}</td>
                            <td>{{ $vendor->city }}</td>
                            <td>{{ $vendor->zip }}</td>
                            <td><input data-id="{{$vendor->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="warning" data-toggle="toggle" data-on="Approved" data-off="Approve" {{ $vendor->user['status'] ? 'checked' : '' }}>
                            </td>

                            <td>
                                <div id="outer">
                                    <a class="btn btn-sm inner" style="color: royalblue"
                                       href="{{ route('vendors.edit',$vendor->id) }}"><i
                                                class="fas fa-edit" title="Edit"></i></a>
                                    <form action="{{route('vendors.destroy', $vendor->id)}}" method="POST" class="inner">
                                        @csrf
                                        @method('DELETE')
                                        <button value="submit" class="btn btn-sm" style="color: red;"><i
                                                    class="fas fa-trash" title="Delete"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script>
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/changeStatus',
                data: {'status': status, 'id': id},
                success: function(data){
                    console.log(data.success)
                }
            });
        });


        $("#user").DataTable();

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
    </script>
@endsection