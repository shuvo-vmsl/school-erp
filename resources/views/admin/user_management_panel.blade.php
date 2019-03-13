@extends('admin.layout.data-table')
@section('contents')
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">User Management Table</h4>
                        <button type="button" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square"></i> Add New</button>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>School ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Edit</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->user_id }}</td>
                                        <td>{{ $user->school_id }}</td>
                                        <td>{{ $user->user_name}}</td>
                                        <td>{{ $user->user_address }}</td>
                                        <td><i class="fa fa-edit"></i></td>
                                        <td>
                                            @if( $user->status_flag==2)
                                                <button type="button" class="btn btn-danger waves-effect waves-light btn-sm" data-toggle="modal" data-target="#ststusModal"> Didable {{ $user->user_id }}</button>
                                            @elseif( $user->status_flag==1)
                                                <button type="button" class="btn btn-success waves-effect waves-light btn-sm" data-toggle="modal" data-target="#ststusModal"> Enable {{ $user->user_id }}</button>
                                                <!--  Modal content for user Status change -->
                                                <div id="ststusModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0" id="myLargeModalLabel">Change user Status</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal m-t-30" data-toggle="validator" role="form" method="POST" action="">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="user_flag"><i class="fa fa-tag"></i> User Status</label>
                                                                        {{ $user->user_id }}
                                                                        <select class="form-control" name="user_flag" id="user_flag">
                                                                            <option disabled selected>Select User Status</option>
                                                                            <option value="1">Enable</option>
                                                                            <option value="2">Disable</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group row m-t-20">
                                                                        <div class="col-sm-6 text-left">
                                                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Save</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- container -->
</div> <!-- Page content Wrapper -->

<!--  Modal content for the above example -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Add A New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal m-t-30" data-toggle="validator" role="form" method="POST" action="{{ route('UserManagements.store')  }}">
                    @csrf
                    <div class="form-group">
                        <label for="user_flag"><i class="fa fa-tag"></i> User Type</label>
                        <select class="form-control" name="user_flag" id="user_flag">
                            <option disabled selected>Select User Type</option>
                            <option value="1">Teacher</option>
                            <option value="2">Student</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="user_name"><i class="fa fa-user"></i> User Name</label>
                        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Enter User Name" required>
                    </div>
                    <div class="form-group">
                        <label for="user_phone"><i class="fa fa-phone"></i> User Phone</label>
                        <input type="Text" class="form-control" name="user_phone" id="user_phone" placeholder="Enter User Phone" required>
                    </div>
                    <div class="form-group">
                            <label for="user_address"><i class="fa fa-map-marker"></i> User Address</label>
                            <textarea name="user_address" id="user_address" cols="64" rows="2"></textarea>
                        </div>
                    <div class="form-group row m-t-20">
                        <div class="col-sm-6 text-left">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection