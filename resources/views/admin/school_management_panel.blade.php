@extends('admin.layout.app')
@section('contents')
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">School Management Table</h4>
                        <button type="button" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square"></i> Add New</button><br></br>
                        <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>School Registration No.</th>
                                    <th>School Name</th>
                                    <th>School Address</th>
                                    <th>Total Teacher</th>
                                    <th>Total Student</th>
                                    <th>Edit</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($schools as $school)
                                    <tr>
                                        <td>{{ $school->school_reg_id }}</td>
                                        <td>{{ $school->school_name }}</td>
                                        <td>{{ $school->school_place }}</td>
                                        <td>{{ $school->school_teacher_no }}</td>
                                        <td>{{ $school->school_student_no }}</td>
                                        <td><i class="fa fa-edit"></i></td>
                                        <td>
                                            @if( $school->school_flag==2)
                                                <button type="button" class="btn btn-danger waves-effect waves-light btn-sm" data-toggle="modal" data-target="#ststusModal"> School is Close </button>
                                            @elseif( $school->school_flag==1)
                                                <button type="button" class="btn btn-success waves-effect waves-light btn-sm" data-toggle="modal" data-target="#ststusModal"> School Is Open</button>
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
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Add A New School</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal m-t-30" data-toggle="validator" role="form" method="POST" action="{{ route('SchoolManagements.store')  }}">
                    @csrf
                    <div class="form-group">
                        <label for="school_name"><i class="fa fa-user"></i> School Name</label>
                        <input type="text" class="form-control" name="school_name" id="school_name" placeholder="Enter User Name" required>
                    </div>
                    <div class="form-group">
                        <label for="school_place"><i class="fa fa-user"></i> School Place</label>
                        <input type="text" class="form-control" name="school_place" id="school_place" placeholder="Enter User Name" required>
                    </div>
                    <div class="form-group">
                        <label for="school_teacher_no"><i class="fa fa-phone"></i>Teacher No.</label>
                        <input type="Text" class="form-control" name="school_teacher_no" id="school_teacher_no" placeholder="Enter User Phone" required>
                    </div>
                    <div class="form-group">
                            <label for="school_student_no"><i class="fa fa-map-marker"></i>Student No.</label>
                            <textarea name="school_student_no" id="school_student_no" cols="64" rows="2"></textarea>
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