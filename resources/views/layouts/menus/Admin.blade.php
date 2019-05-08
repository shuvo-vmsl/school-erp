
<ul id="menu">
	<li @if(Request::is('dashboard')) class="active" @endif>
		<a href="{{route('dashboard')}}" class="waves-effect">
			<i class="fa fa-desktop"></i>
			{{ _lang('Dashboard') }}
		</a>
	</li>
	<li class="has_sub">
		<a class="waves-effect" href="#"><i class="fa fa-user-o"></i>{{ _lang('Profile') }}</a>
			<ul>
				<li>
					<a class="waves-effect" href="{{ url('profile/my_profile')}}">
						{{ _lang('Profile') }}
					</a>
				</li>
				<li>
					<a class="waves-effect" class="dropdown-item" href="{{ route('logout') }}"
					onclick="event.preventDefault();
					document.getElementById('logout-form2').submit();">
					{{ __('Logout') }}
				</a>
			</li>
			<form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
		</ul>
	</li>

	<li class="has_sub">
		<a class="waves-effect" href="#"><i class="fa fa-address-card"></i>{{ _lang('Students') }}</a>
		<ul>
		   <li @if((Request::is('students'))OR(Request::is('students/create'))OR(Request::is('students/edit'))) class="active" @endif>
				<a class="waves-effect" href="{{ route('students.index') }}">
					{{ _lang('Students') }}
				</a>
			</li>
		</ul>
	 </li>

	<li class="has_sub">
		<a class="waves-effect" href="#"><i class="fa fa-building-o"></i>{{ _lang('Academic') }}</a>
		<ul>
		   <li @if((Request::is('class'))OR(Request::is('class/*'))) class="active" @endif>
				<a class="waves-effect" href="{{route('class.index')}}">
					{{ _lang('Class') }}
				</a>
			</li>
			<li @if((Request::is('sections'))OR(Request::is('sections/*'))) class="active" @endif>
				<a class="waves-effect" href="{{route('sections.index')}}">
					{{ _lang('Sections') }}
				</a>
			</li>
			<li @if((Request::is('subjects'))OR(Request::is('subjects/*'))) class="active" @endif>
				<a class="waves-effect" href="{{route('subjects.index')}}">
					{{ _lang('Subjects') }}
				</a>
			</li>
			<li @if((Request::is('assignsubjects'))OR(Request::is('assignsubjects/*'))) class="active" @endif>
				<a class="waves-effect" href="{{route('assignsubjects.index')}}">
					{{ _lang('Assign Subjects') }}
				</a>
			</li>
			<li @if((Request::is('assignments'))OR(Request::is('assignments/*'))) class="active" @endif>
				<a class="waves-effect" href="{{route('assignments.index')}}">
					{{ _lang('Assignments') }}
				</a>
			</li>
		</ul>
	</li>

	<li class="has_sub">
		<a href="#"><i class="fa fa-calendar-check-o"></i>Attendance</a>
		<ul>
		   <li @if((Request::is('student'))OR(Request::is('student/*'))) class="active" @endif>
				<a class="waves-effect" href="{{url('student/attendance')}}">
					{{ _lang('Student Attendance') }}
				</a>
			</li>
		</ul>
	</li>

	<li class="has_sub">
		<a class="waves-effect" href="#"><i class="fa fa-bar-chart"></i>{{ _lang('Reports') }}</a>
		<ul>
		   <li @if(Request::is('reports/student_attendance_report') || Request::is('reports/student_attendance_report/view')) class="active" @endif>
				<a class="waves-effect" href="{{ url('reports/student_attendance_report') }}">
					{{ _lang('Student Attendance') }}
				</a>
		   </li>
		</ul>
	</li>

	<li>
		<a class="waves-effect" href="{{ url('users') }}">
		<i class="fa fa-users"></i>
			{{_lang('Users')}}
		</a>
	</li>

	<li @if((Request::is('users'))OR(Request::is('users/*'))) class="active" @endif>
			<a class="waves-effect" href="{{route('users.index')}}">
			<i class="fa fa-users"></i>
				{{ _lang('User Management') }}
			</a>
	</li>
	<li @if	((Request::is('user')) OR(Request::is('users/'))) class="active" @endif>
		<a class="waves-effect" href="{{ route('users.index') }}">
		<i class="fa fa-users"></i>
			{{ _lang('User Management') }}
		</a>
	</li>

		</ul>
	 </li>

</ul>
