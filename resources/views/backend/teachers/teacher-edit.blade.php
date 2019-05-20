@extends('layouts.backend')
@section('content')
<div class="page-content-wrapper">
    <div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card panel-default" data-collapsed="0">
						<div class="card-header">
							<div class="card-title" >
								{{_lang('Update Teacher')}}
							</div>
						</div>
						<div class="card-body">
							<div class="col-md-8">
							<form action="{{route('teachers.update',$teacher->id)}}" autocomplete="off" class="form-horizontal validate" autocomplete="off" method="post" enctype="multipart/form-data">
								@csrf
								{{ method_field('PATCH') }}
								<div class="form-group">
									<label class="col-sm-3 control-label">{{_lang('Name')}}</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="name" value="{{ $teacher->name }}" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">{{_lang('Designation')}}</label>
									<div class="col-sm-9">
											<select class="form-control" name="designation" required>
											<option value="">{{ _lang('Select One') }}</option>
											{{ create_option("picklists","value","value",$teacher->designation,array("type="=>"Designation")) }}	
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-3 control-label">{{_lang('Birthday')}}</label>
									<div class="col-sm-9">
										<input type="text" class="form-control datepicker" name="birthday" value="{{ $teacher->birthday }}" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">{{_lang('Gender')}}</label>
									<div class="col-sm-9">
										<select name="gender" class="form-control" required>
											<option @if($teacher->gender=='Male') selected @endif value="Male">Male</option>
											<option @if($teacher->gender=='Female') selected @endif value="Female">Female</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">{{_lang('Religion')}}</label>
									<div class="col-sm-9">
											<select name="religion" class="form-control wide" required>
											<option value="">{{ _lang('Select One') }}</option>
											{{ create_option("picklists","value","value",$teacher->religion,array("type="=>"Religion")) }}	
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">{{_lang('Phone')}}</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="phone" value="{{ $teacher->phone }}" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">{{_lang('Address')}}</label>
									<div class="col-sm-9">
										<textarea class="form-control" name="address" required>{{ $teacher->address }}</textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">{{_lang('Joining Date')}}</label>
									<div class="col-sm-9">
										<input type="text" class="form-control datepicker" name="joining_date" value="{{ $teacher->joining_date }}" required>
									</div>
								</div>
								
								<hr>
								<div class="page-header">
									<h4>Login Details</h4>
								</div>
								
								<div class="form-group">
									<label class="col-sm-3 control-label">{{_lang('Email')}}</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" name="email" value="{{ $teacher->email }}" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">{{_lang('Password')}}</label>
									<div class="col-sm-9">
										<input type="password" class="form-control" name="password">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">{{_lang('Confirm Password')}}</label>
									<div class="col-sm-9">
										<input type="password" class="form-control" name="password_confirmation">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-3 control-label">{{_lang('Profile Picture')}}</label>
									<div class="col-sm-9">
										<input type="file" class="form-control dropify" name="image" data-default-file="{{ asset('public/uploads/images/'.$teacher->image) }}" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-5">
										<button type="submit" class="btn btn-info">{{_lang('Update Teacher')}}</button>
									</div>
								</div>
							</form>
							</div>	
						</div>
					</div>
				</div>
			</div>
	</div>
</div>
@endsection