@extends('layouts.backend')
@section('content')
<div class="page-content-wrapper">
    <div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-lg-6 col-xl-4">
				<div class="mini-stat clearfix bg-white">
					<span class="mini-stat-icon bg-purple mr-0 float-right"><i class="mdi mdi-basket"></i></span>
					<div class="mini-stat-info">
						<span class="counter text-purple">{{ get_option('currency_symbol')." ".$total_paid }}</span>
						{{ _lang('Total Paid') }}
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-xl-4">
				<div class="mini-stat clearfix bg-white">
					<span class="mini-stat-icon bg-purple mr-0 float-right"><i class="mdi mdi-basket"></i></span>
					<div class="mini-stat-info">
						<span class="counter text-purple">{{ $paid_invoice }}</span>
						{{ _lang('Paid Invoice') }}
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-xl-4">
				<div class="mini-stat clearfix bg-white">
					<span class="mini-stat-icon bg-purple mr-0 float-right"><i class="mdi mdi-basket"></i></span>
					<div class="mini-stat-info">
						<span class="counter text-purple">{{ $unpaid_invoice }}</span>
						{{ _lang('Unpaid Invoice') }}
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title text-center">{{ _lang('Notice') }}</h4>
					</div>
					<div class="content no-export">
						<table class="table table-bordered data-table">
						<thead>
							<th>{{ _lang('Notice') }}</th>
							<th>{{ _lang('Created') }}</th>
							<th class="text-center">{{ _lang('View') }}</th>
						</thead>
						<tbody>
								@foreach(get_notices("Student",100) as $notice)
								<tr>
									<td>{{ $notice->heading }}</td>
									<td>{{ date("d M, Y - H:i", strtotime($notice->created_at)) }}</td>
									<td class="text-center"><a href="{{ action('NoticeController@show', $notice->id) }}" data-title="{{ _lang('View Notice') }}" class="btn btn-primary btn-sm ajax-modal">{{ _lang('View Notice') }}</a></td>
								</tr>
								@endforeach
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
<br>
<!-- <div class="row">
		<div class="col-12">
				<div class="card">
						<div class="card-body">
								<div id='calendar'></div>

								<div style='clear:both'></div>
						</div>
				</div>
		</div>
</div> -->
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title text-center">{{ _lang('Event Calendar') }}</h4>
					</div>
					<div class="content">
						<div id='event_calendar'></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js-script')
<script>

  $(document).ready(function() {

    $('#event_calendar').fullCalendar({
		themeSystem: 'bootstrap4',	
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,basicWeek,basicDay'
		},
		//defaultDate: '2018-03-12',
		eventBackgroundColor: "#0984e3",
		navLinks: true, // can click day/week names to navigate views
		editable: true,
		eventLimit: true, // allow "more" link when too many events
		timeFormat: 'h:mm',
		events: [
			@foreach(get_events(100) as $event)
				{
				  title: '{{ $event->name }}',
				  start: '{{ $event->start_date }}',
				  end: '{{ $event->end_date }}',
				  url: '{{ action("EventController@show", $event->id) }}'
				},
			@endforeach
	   ],
	   eventRender: function eventRender(event, element, view) {
		   element.addClass('ajax-modal');
		   element.data("title","{{ _lang('View Event') }}");
	   }
    });
	
	

  });

</script>
@endsection