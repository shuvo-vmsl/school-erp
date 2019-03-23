@extends('admin.layout.app')
@section('contents')
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <br />
                    <h3>Edit Enroll</h3>
                <br />
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                    </div>
                    <form method="post" action="{{route('Enrolls.update', $id)}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="PATCH" />
                        <div class="form-group">
                            <input type="text" name="subject_id" class="form-control" value="{{$enrolls->subject_id}}" placeholder="Enter First Name" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="teacher_name" class="form-control" value="{{$enrolls->teacher_name}}" placeholder="Enter First Name" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="section_id" class="form-control" value="{{$enrolls->section_id}}" placeholder="Enter First Name" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="period_id" class="form-control" value="{{$enrolls->period_id}}" placeholder="Enter First Name" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Edit" />
                        </div>
                    </form>
                </div>
            </div> <!-- end row -->
    </div><!-- container -->
</div> <!-- Page content Wrapper -->

@endsection