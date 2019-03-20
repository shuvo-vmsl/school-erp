@extends('admin.layout.app')
@section('contents')
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <br />
                    <h3>Edit Record</h3>
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
                    <form method="post" action="{{route('SchoolClasss.update', $id)}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="PATCH" />
                        <div class="form-group">
                            <input type="text" name="class_id" class="form-control" value="{{$schoolclass->class_id}}" placeholder="Enter First Name" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="calss_teacher" class="form-control" value="{{$schoolclass->calss_teacher}}" placeholder="Enter Last Name" />
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