@extends('admin.layout.app')
@section('contents')
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Enroll Table</h4>
                        <button type="button" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square"></i> Add New</button><br></br>
                        <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No.                     </th>
                                    <th>School Registration No. </th>
                                    <th>Class                   </th>
                                    <th>Section ID              </th>
                                    <th>Period ID               </th>
                                    <th>Enroll ID               </th>
                                    <th>Subject                 </th>
                                    <th>Teacher Name            </th>
                                    <th>User ID                 </th>
                                    <th>Result                  </th>
                                    <th>Edit                    </th>
                                    <th>Delete                  </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($enrolls as $row)
                                    <tr>
                                        <td>{{ $row->id }}              </td>
                                        <td>{{ $row->school_reg_id }}   </td>
                                        <td>{{ $row->class_id }}        </td>
                                        <td>{{ $row->section_id }}      </td>
                                        <td>{{ $row->period_id }}       </td>
                                        <td>{{ $row->enroll_id }}       </td>
                                        <td>{{ $row->subject_id }}      </td>
                                        <td>{{ $row->teacher_name }}    </td>
                                        <td>{{ $row->user_id }}         </td>
                                        <td>{{ $row->result }}          </td>
                                        <td>
                                            <a href="{{action('EnrollController@edit', $row->id)}}" class="btn btn-warning"> <i class="fa fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <form method="post" class="delete_form" action="{{action('EnrollController@destroy', $row['id'])}}">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
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

<!--  Modal content for the Add new data -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Add Enroll</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal m-t-30" data-toggle="validator" role="form" method="POST" action="{{ route('Enrolls.store')  }}">
                    @csrf
                    <div class="form-group">
                        <label for="subject_id"><i class="fa fa-user"></i> Subject ID</label>
                        <input type="text" class="form-control" name="subject_id" id="subject_id" placeholder="Enter User Name" required>
                    </div>
                    <div class="form-group">
                        <label for="teacher_name"><i class="fa fa-user"></i>Teacher</label>
                        <input type="text" class="form-control" name="teacher_name" id="teacher_name" placeholder="Enter User Name" required>
                    </div>
                    <div class="form-group">
                        <label for="section_id"><i class="fa fa-user"></i>Section</label>
                        <input type="text" class="form-control" name="section_id" id="section_id" placeholder="Enter User Name" required>
                    </div>
                    <div class="form-group">
                        <label for="period_id"><i class="fa fa-user"></i>Period</label>
                        <input type="text" class="form-control" name="period_id" id="period_id" placeholder="Enter User Name" required>
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
<script>
    $(document).ready(function(){
        $('.delete_form').on('submit', function(){
            if(confirm("Are you sure you want to delete it?")){
                return true;
            }
            else{
                return false;
            }
        });
    });
</script>
@endsection