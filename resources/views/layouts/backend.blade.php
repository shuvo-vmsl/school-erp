<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('public/uploads') }}/images/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('public/uploads') }}/images/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ get_option('site_title')}}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('public/admin-asset') }}/assets/plugins/c3/c3.min.css" rel="stylesheet" />
    <!-- Datatable core CSS     -->
    <link href="{{ asset('public/admin-asset') }}/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="{{ asset('public/admin-asset') }}/assets/css/icons.css" rel="stylesheet"/>
	<!-- bootstrap-datepicker library -->
	<link href="{{ asset('public/admin-asset') }}/assets/css/style.css" rel="stylesheet"/>
	<!--calendar css-->
	<link href="{{ asset('public/admin-asset') }}/assets/plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet" />
	<!-- Datatable core CSS     -->
	<link href="{{ asset('public/backend') }}/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<!--  Quill editor    -->
	<link href="{{ asset('public/backend') }}/css/summernote.css" rel="stylesheet"/>
	<script type="text/javascript">
	   var direction = "{{ get_option('backend_direction') }}";
	</script>
	<!-- @include('layouts.css.dynamic_css') -->
</head>
<body class="fixed-left">
    <div id="wrapper">
        @include('layouts.sidebar') <!--Including sidebar (side navigation) -->
        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                @include('layouts.topbar')
                <!-- Main Modal -->
            	<div id="main_modal" class="modal animated bounceInDown" role="dialog">
            	  <div class="modal-dialog">
            		<!-- Modal content-->
            		<div class="modal-content">
            		  <div class="modal-header">
            			<button type="button" class="modal-btn btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="glyphicon glyphicon-remove-circle"></i> {{ _lang('Exit') }}</button>
            			<button type="button" id="modal-fullscreen" class="modal-btn btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-fullscreen"></i> {{ _lang('Full Screen') }}</button>
            			<h5 class="modal-title"></h5>
            		  </div>
            		  <div class="alert alert-danger" style="display:none; margin: 15px;"></div>
            		  <div class="alert alert-success" style="display:none; margin: 15px;"></div>
            		  <div class="modal-body" style="overflow:hidden;"></div>
            		</div>
            	  </div>
            	</div>
            	<div id="preloader">
            		<div class="bar"></div>
            	</div>
                <!-- ==================PAGE CONTENT START================== -->
                @yield('content')<!--body contents will be added here -->
            </div> <!-- content -->
        </div>
        <!-- End Right content here -->
    </div>
</body>
<!-- jQuery  -->
       <script src="{{ asset('public/admin-asset') }}/assets/js/jquery.min.js"></script>
       <script src="{{ asset('public/admin-asset') }}/assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
       <script src="{{ asset('public/admin-asset') }}/assets/js/bootstrap.min.js"></script>
       <script src="{{ asset('public/admin-asset') }}/assets/js/modernizr.min.js"></script>
       <script src="{{ asset('public/admin-asset') }}/assets/js/jquery.slimscroll.js"></script>
       <script src="{{ asset('public/admin-asset') }}/assets/js/waves.js"></script>
       <script src="{{ asset('public/admin-asset') }}/assets/js/jquery.nicescroll.js"></script>
       <script src="{{ asset('public/admin-asset') }}/assets/js/jquery.scrollTo.min.js"></script>

       <!-- Peity chart JS -->
       <script src="{{ asset('public/admin-asset') }}/assets/plugins/peity-chart/jquery.peity.min.js"></script>

       <!--C3 Chart-->
       <script type="text/javascript" src="{{ asset('public/admin-asset') }}/assets/plugins/d3/d3.min.js"></script>
       <script type="text/javascript" src="{{ asset('public/admin-asset') }}/assets/plugins/c3/c3.min.js"></script>

       <!-- KNOB JS -->
       <script src="{{ asset('public/admin-asset') }}/assets/plugins/jquery-knob/excanvas.js"></script>
       <script src="{{ asset('public/admin-asset') }}/assets/plugins/jquery-knob/jquery.knob.js"></script>

       <!-- Page specific js -->
       <script src="{{ asset('public/admin-asset') }}/assets/pages/dashboard.js"></script>

       <!-- App js -->
	   <script src="{{ asset('public/admin-asset') }}/assets/js/app.js"></script>
	   <script src="{{ asset('public/admin-asset') }}/assets/plugins/dropzone/dist/dropzone.js"></script>
		<!-- Jquery-Ui -->
		<script src="{{ asset('public/admin-asset') }}/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
		<script src="{{ asset('public/admin-asset') }}/assets/plugins/moment/moment.js"></script>
		<script src="{{ asset('public/admin-asset') }}/assets/plugins/fullcalendar/js/fullcalendar.min.js"></script>
		<script src="{{ asset('public/admin-asset') }}/assets/pages/calendar-init.js"></script>





<script type="text/javascript" src="{{ asset('public/backend') }}/js/jquery.min.js"></script>

<script type="text/javascript" src="{{ asset('public/backend') }}/js/bootstrap.min.js"></script>
<!--  Charts Plugin -->
<script type="text/javascript" src="{{ asset('public/backend') }}/js/echarts.min.js"></script>
<!--  Notifications Plugin    -->
<script type="text/javascript" src="{{ asset('public/backend') }}/js/bootstrap-notify.js"></script>
<!--  DataTable Plugin    -->
<script type="text/javascript" src="{{ asset('public/backend') }}/js/jquery.dataTables.min.js"></script>
<!--  Select 2 Plugin    -->
<script type="text/javascript" src="{{ asset('public/backend') }}/js/select2.min.js"></script>
<!--  jQuery Validation   -->
<script type="text/javascript" src="{{ asset('public/backend') }}/js/jquery.validate.min.js"></script>
<!--  Bootstrap Datepicker  -->
<script type="text/javascript" src="{{ asset('public/backend') }}/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="{{ asset('public/backend') }}/js/jquery.mask.min.js"></script>
<!--  Summernote editor    -->
<script type="text/javascript" src="{{ asset('public/backend') }}/js/summernote.js"></script>
<!--  Dropify  -->
<script type="text/javascript" src="{{ asset('public/backend') }}/js/dropify.min.js"></script>
<script type="text/javascript" src="{{ asset('public/backend') }}/js/toastr.js"></script>
<script type="text/javascript" src="{{ asset('public/backend') }}/js/jquery.nice-select.min.js"></script>
<script type="text/javascript" src="{{ asset('public/backend') }}/js/print.js"></script>
<script type="text/javascript" src="{{ asset('public/backend') }}/js/jquery.nestable.js"></script>

<script src="{{ asset('public/backend') }}/js/metisMenu.min.js"></script>
<script src="{{ asset('public/backend') }}/js/moment.min.js"></script>
<script src="{{ asset('public/backend') }}/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript" src="{{ asset('public/backend') }}/js/fullcalendar.min.js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script type="text/javascript" src="{{ asset('public/backend') }}/js/script.js"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script type="text/javascript" src="{{ asset('public/backend') }}/js/dashboard.js"></script>

<!-- JS -->
@yield('js-script')

<script type="text/javascript">
$(document).ready(function(){

     @if(Request::is('dashboard') && \Auth::user()->user_type == 'Admin')
         dashboard.admin_init();
	 @elseif(Request::is('dashboard') && \Auth::user()->user_type == 'Accountant')
	     dashboard.accountant_init();
	 @elseif( ! Request::is('dashboard'))
	    $(".navbar-brand").html($(".title").html());
	    $(".navbar-brand").html($(".panel-title").html());
		$("#last_link").html($(".navbar-brand").html());
     @endif

    $(".data-table").DataTable({
		responsive: true,
		"bAutoWidth":false,
		"ordering": false,
		"language": {
		   "decimal":        "",
		   "emptyTable":     "{{ _lang('No Data Found') }}",
		   "info":           "{{ _lang('Showing') }} _START_ {{ _lang('to') }} _END_ {{ _lang('of') }} _TOTAL_ {{ _lang('Entries') }}",
		   "infoEmpty":      "{{ _lang('Showing 0 To 0 Of 0 Entries') }}",
		   "infoFiltered":   "(filtered from _MAX_ total entries)",
		   "infoPostFix":    "",
		   "thousands":      ",",
		   "lengthMenu":     "{{ _lang('Show') }} _MENU_ {{ _lang('Entries') }}",
		   "loadingRecords": "{{ _lang('Loading...') }}",
		   "processing":     "{{ _lang('Processing...') }}",
		   "search":         "{{ _lang('Search') }}",
		   "zeroRecords":    "{{ _lang('No matching records found') }}",
		   "paginate": {
			  "first":      "{{ _lang('First') }}",
			  "last":       "{{ _lang('Last') }}",
			  "next":       "{{ _lang('Next') }}",
			  "previous":   "{{ _lang('Previous') }}"
		  },
		  "aria": {
			  "sortAscending":  ": activate to sort column ascending",
			  "sortDescending": ": activate to sort column descending"
		  }
	  },
	  dom: 'Blfrtip',
	  buttons: [
	  'copy', 'csv', 'excel', 'pdf', 'print'
	  ],
    });

	//Show Success Message
	@if(Session::has('success'))
	   Command: toastr["success"]("{{session('success')}}")
	@endif

	//Show Single Error Message
	@if(Session::has('error'))
	   Command: toastr["error"]("{{session('error')}}")
	@endif


	<?php $i =0; ?>

	@foreach ($errors->all() as $error)
        Command: toastr["error"]("{{ $error }}");

		var name= "{{$errors->keys()[$i] }}";

		$("input[name='"+name+"']").addClass('error');
		$("select[name='"+name+"'] + span").addClass('error');

		$("input[name='"+name+"'], select[name='"+name+"']").parent().append("<span class='v-error'>{{$error}}</span>");

		<?php $i++; ?>

	@endforeach
});

function changeSession(elem){
	if($(elem).val() == ""){
		return;
	}
	window.location = "<?php echo url('administration/change_session') ?>/"+$(elem).val();
}

$("#menu li").each(function(){
	var elem = $(this);
	if($(elem).has("ul").length>0){
		if($(elem).find("ul").has("li").length === 0){
			$(elem).remove();
		}
	}
});


if($(".notification-items").has("li").length === 0){
	$(".notification-items").append("<li><a href='#'>No Message Found !</a></li>");
}


</script>
</html>
