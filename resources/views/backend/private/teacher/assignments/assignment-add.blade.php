@extends('layouts.backend')
@section('content')
<div class="page-content-wrapper">
    <div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card panel-default" data-collapsed="0">
					<div class="card-header">
						<div class="card-title" >
							{{_lang('Add New Assignment')}}
						</div>
					</div>
					<div class="card-body">
						<div class="col-md-10">
							<form action="{{ url('teacher/store_assignment') }}" class="form-horizontal form-groups-bordered validate" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
								@csrf
								<div class="form-group">
									<label class="col-sm-3 control-label">{{_lang('Title')}}</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
										<input type="text" class="form-control" name="school_id" value="{{ Auth::user()->school_id }}" required hidden>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">{{_lang('Description')}}</label>
									<div class="col-sm-9">
										<textarea class="form-control" id="summernote" name="description">{{ old('description') }}</textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">{{_lang('Deadline')}}</label>
									<div class="col-sm-6">
										<input type="text" class="form-control datepicker" name="deadline" value="{{ old('deadline') }}" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">{{_lang('Class')}}</label>
									<div class="col-sm-6">
										<select class="form-control" name="class_id" onChange="getData(this.value);" required>
											<option value="">{{ _lang('Select One') }}</option>
											{{ create_option('classes','id','class_name',old('class_id')) }}
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">{{_lang('Section')}}</label>
									<div class="col-sm-6">
										<select name="section_id" onChange="getSubject();" class="form-control" required>
											<option value="">{{ _lang('Select One') }}</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">{{_lang('Subject')}}</label>
									<div class="col-sm-6">
										<select name="subject_id" class="form-control" required>
											<option value="">{{ _lang('Select One') }}</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">{{_lang('File')}}</label>
									<div class="col-sm-6">
										<input type="file" class="form-control appsvan-file" name="file" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">{{_lang('File (Optional)')}}</label>
									<div class="col-sm-6">
										<input type="file" class="form-control appsvan-file" name="file_2">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">{{_lang('File (Optional)')}}</label>
									<div class="col-sm-6">
										<input type="file" class="form-control appsvan-file" name="file_3">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">{{_lang('File (Optional)')}}</label>
									<div class="col-sm-6">
										<input type="file" class="form-control appsvan-file" name="file_4" >
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-5">
										<button type="submit" class="btn btn-info">Add Assignment</button>
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
@section('js-script')
<script type="text/javascript">
	function getData(val) {
		var _token=$('input[name=_token]').val();
		var class_id=$('select[name=class_id]').val();
		$.ajax({
			type: "POST",
			url: "{{url('sections/section')}}",
			data:{_token:_token,class_id:class_id},
			success: function(sections){
				$('select[name=subject_id]').html("")
				$('select[name=section_id]').html(sections);				
			}
		});
		
		
	}
	
	function getSubject() {
		var _token = $('input[name=_token]').val();
		var class_id = $('select[name=class_id]').val();
		var section_id = $('select[name=section_id]').val();
		$.ajax({
			type: "POST",
			url: "{{ url('exams/get_teacher_subject') }}",
			data:{_token:_token, class_id:class_id, section_id:section_id},
			success: function(subjects){
				$('select[name=subject_id]').html(subjects);				
			}
		});
	}
	
	
</script>
@stop
@endsection