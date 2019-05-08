@extends('layouts.backend')
@section('content')
<div class="page-content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card m-b-20">
					<div class="card-body">
						{{ _lang('Add User') }}
						<form action="{{route('users.store')}}" class="form-horizontal m-t-30" data-toggle="validator" role="form" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
							@csrf
							<div class="form-group">
								<label class="col-sm-3 control-label">{{ _lang('Name') }}</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
									<input type="text" class="form-control" name="school_id" value="{{ Auth::user()->school_id }}" required hidden>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">{{ _lang('Email') }}</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">{{ _lang('Phone') }}</label>
								<div class="col-sm-9">
									<input type="phone" class="form-control" name="phone" value="{{ old('phone') }}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">{{ _lang('Password') }}</label>
								<div class="col-sm-9">
									<input type="password" class="form-control" name="password" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">{{ _lang('Confirm Password') }}</label>
								<div class="col-sm-9">
									<input type="password" class="form-control" name="password_confirmation" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">{{ _lang('User Type') }}</label>
								<div class="col-sm-9">
									<select name="user_type" id="user_type" class="form-control" required>
										<option value="">{{ _lang('Select One') }}</option>
										<option value="Admin">{{ _lang('Admin') }}</option>
										<option value="Accountant">{{ _lang('Accountant') }}</option>
										<option value="Librarian">{{ _lang('Librarian') }}</option>
										<option value="Employee">{{ _lang('Employee') }}</option>
										<option value="Teacher" disabled>{{ _lang('Teacher') }}</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">{{ _lang('Permission Role') }}</label>
								<div class="col-sm-9">
									<select name="role_id" id="role_id" class="form-control" required>
										<option value="">{{ _lang('Select One') }}</option>
										<option value="0">{{ _lang('Default') }}</option>
										{{ create_option("permission_roles","id","role_name") }}
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">{{ _lang('Profile') }}</label>
								<div class="col-sm-9">
									<input type="file" class="form-control dropify" name="image" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
								</div>
							</div>

							<div class="form-group">
								<!-- <label class="col-sm-3 control-label">{{ _lang('Facebook Link') }}</label> -->
								<div class="col-sm-9">
									<input type="text" class="form-control" name="facebook" value="{{ old('facebook') }}" hidden>
								</div>
							</div>

							<div class="form-group">
								<!-- <label class="col-sm-3 control-label">{{ _lang('Twitter Link') }}</label> -->
								<div class="col-sm-9">
									<input type="text" class="form-control" name="twitter" value="{{ old('twitter') }}" hidden>
								</div>
							</div>

							<div class="form-group">
								<!-- <label class="col-sm-3 control-label">{{ _lang('Linkedin Link') }}</label> -->
								<div class="col-sm-9">
									<input type="text" class="form-control" name="linkedin" value="{{ old('linkedin') }}" hidden>
								</div>
							</div>

							<div class="form-group">
								<!-- <label class="col-sm-3 control-label">{{ _lang('Google Plus Link') }}</label> -->
								<div class="col-sm-9">
									<input type="text" class="form-control" name="google_plus" value="{{ old('google_plus') }}" hidden>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-info">{{ _lang('Add User') }}</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('js-script')
<script>
	$("#user_type").val("{{ old('user_type') }}");
	$("#role_id").val("{{ old('role_id') }}");
</script>
@endsection
