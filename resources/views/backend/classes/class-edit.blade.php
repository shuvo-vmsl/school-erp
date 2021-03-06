@extends('layouts.backend')
@section('content')
<div class="page-content-wrapper">
    <div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="card panel-default" data-collapsed="0">
					<div class="card-header">
						<div class="card-title" >
							{{_lang('Update Class')}}
						</div>
					</div>
					<div class="card-body">
						<form action="{{route('class.update',$class->id)}}" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
							@csrf
							{{ method_field('PATCH') }}
							<div class="form-group">
								<div class="col-sm-12">
									<label class="control-label">{{_lang('Name')}}</label>
									<input type="text" class="form-control" name="class_name" value="{{ $class->class_name }}" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-info">{{_lang('Update Class')}}</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="card panel-default" data-collapsed="0">
					<div class="card-header">
						<div class="card-title" >
							{{_lang('Classes List')}}
						</div>
					</div>
					<div class="card-body no-export">
						<table class="table table-bordered data-table">
							<thead>
								<th>{{_lang('Name')}}</th>
								<th>{{_lang('Action')}}</th>
							</thead>
							<tbody>
								@foreach($classes AS $data)
								<tr>
									<td>{{$data->class_name}}</td>
									<td>
										<form action="{{route('class.destroy',$data->id)}}" method="post">
											<a href="{{route('class.edit',$data->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
											{{ method_field('DELETE') }}
											@csrf
											<button type="submit" class="btn btn-danger btn-xs btn-remove"><i class="fa fa-eraser" aria-hidden="true"></i></button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection