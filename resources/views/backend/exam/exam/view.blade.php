@extends('layouts.backend')

@section('content')
<div class="page-content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="card panel-default">
					<div class="card-header">{{ _lang('View Exam') }}</div>
					<div class="card-body">
						<table class="table table-bordered">
							<tr><td>{{ _lang('Name') }}</td><td>{{ $exam->name }}</td></tr>
							<tr><td>{{ _lang('Note') }}</td><td>{{ $exam->note }}</td></tr>		
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


