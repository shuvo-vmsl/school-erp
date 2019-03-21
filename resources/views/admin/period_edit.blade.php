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
                    <form method="post" action="{{route('Periods.update', $id)}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="PATCH" />
                        <div class="form-group">
                            <input type="text" name="period_id" class="form-control" value="{{$periods->period_id}}" placeholder="Enter First Name" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="period_teacher" class="form-control" value="{{$periods->period_teacher}}" placeholder="Enter First Name" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="period_subject" class="form-control" value="{{$periods->period_subject}}" placeholder="Enter First Name" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="period_time" class="form-control" value="{{$periods->period_time}}" placeholder="Enter First Name" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="period_class_room_no" class="form-control" value="{{$periods->period_class_room_no}}" placeholder="Enter Last Name" />
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