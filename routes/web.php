<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['install']], function () {
	//Auth Route
	Route::get('/login', function () {
		return redirect('login');
	});

	Auth::routes();

	//Frontend Route



	Route::group(['middleware' => ['auth']], function () {
		/** Common Route for All **/
		Route::get('dashboard','DashboardController@index')->name('dashboard');

		//Profile Controller
		Route::get('profile/my_profile', 'ProfileController@my_profile');
		Route::get('profile/edit', 'ProfileController@edit');
		Route::post('profile/update', 'ProfileController@update');
		Route::get('profile/changepassword', 'ProfileController@change_password');
		Route::post('profile/updatepassword', 'ProfileController@update_password');


		/** Permission Route Group **/
		Route::group(['middleware' => ['permission']], function () {

			//User Controller
			Route::get('users/get_users/{user_type}', 'UserController@get_users');
			Route::resource('users','UserController');

			//FrontOffice Route
			Route::resource('admission_enquiries','AdmissionEnquiryController');

			//Teacher Route
			Route::get('teachers/excel_import','TeacherController@excel_import')->name('teachers.excel_import');
			Route::post('teachers/excel_store','TeacherController@excel_store')->name('teachers.excel_import');
			Route::resource('teachers','TeacherController');

			//Parents Route
			Route::get('parents/get_parents','ParentController@get_parents');
			Route::resource('parents','ParentController');

			//Student Route
			Route::get('students/excel_import','StudentController@excel_import')->name('students.excel_import');
			Route::post('students/excel_store','StudentController@excel_store')->name('students.excel_store');
			Route::get('students/id_card/{student_id}', 'StudentController@id_card')->name('students.view_id_card');
			Route::get('students/class/{class_id?}', 'StudentController@class')->name('students.index');
			Route::get('students/get_subjects/{class_id}', 'StudentController@get_subjects');
			Route::get('students/get_students/{class_id}/{section_id}', 'StudentController@get_students');
			Route::resource('students','StudentController');

			//Class Controller
			Route::resource('class','ClassController');

			//Section Route
			Route::post('sections/section', 'SectionController@get_section');
			Route::get('sections/class/{class_id}', 'SectionController@index')->name('sections.index');
			Route::resource('sections','SectionController');

			//Subject Route
			Route::get('subjects/class/{class_id}', 'SubjectController@index')->name('subjects.index');
			Route::post('subjects/subject', 'SubjectController@get_subject');
			Route::resource('subjects','SubjectController');

			//Assign Subject Route
			Route::post('assignsubjects/search', 'AssignSubjectController@search')->name('assignsubjects.index');
			Route::resource('assignsubjects','AssignSubjectController');

			Route::resource('syllabus','SyllabusController');
			Route::resource('assignments','AssignmentController');
			Route::resource('academic_years','AcademicYearController');
			Route::resource('student_groups','StudentGroupController');


			//Attendance Controller
			Route::match(['get','post'],'student/attendance','AttendanceController@student_attendance')->name('student_attendance.create');
			Route::post('student/attendance/save', 'AttendanceController@student_attendance_save')->name('student_attendance.create');


			//Utility Controller
			Route::match(['get', 'post'],'administration/general_settings/{store?}', 'UtilityController@settings')->name('general_settings.update');
			Route::post('administration/theme_option/{store?}', 'UtilityController@update_theme_option')->name('theme_option.update');
			Route::get('administration/change_session/{session_id}', 'UtilityController@change_session')->name('general_settings.update');
			Route::post('administration/upload_logo', 'UtilityController@upload_logo')->name('general_settings.update');
			Route::get('administration/backup_database', 'UtilityController@backup_database')->name('utility.backup_database');

			//Language Controller
			Route::resource('languages','LanguageController');

			//PickList Controller
			Route::get('picklists/type/{type}', 'PicklistController@type')->name('picklists.index');
			Route::resource('picklists','PicklistController');






			//Report Controller
			Route::match(['get', 'post'],'reports/student_attendance_report/{view?}', 'ReportController@student_attendance_report')->name('reports.student_attendance_report');
			Route::match(['get', 'post'],'reports/student_id_card/{view?}', 'ReportController@student_id_card')->name('reports.student_id_card');


			//Page Controller
			Route::resource('pages','PageController');


			//Route::get('website_languages/translate/{language_id?}','WebsiteLanguageController@translate')->name("website_languages.translate");
			//Route::post('website_languages/store_translate','WebsiteLanguageController@store_translate')->name("website_languages.translate");
			//Route::resource('website_languages','WebsiteLanguageController');

			//Site Navigation
			Route::resource('site_navigations','SiteNavigationController');
			Route::get('site_navigation_items/navigation/{navigation_id?}','NavigationItemController@index')->name("site_navigation_items.index");
			Route::get('site_navigation_items/create/{navigation_id?}','NavigationItemController@create')->name("site_navigation_items.create");
			Route::resource('site_navigation_items','NavigationItemController');

			Route::match(['get', 'post'],'website/menu_sorting', 'FrontendSettingController@menu_sorting')->name('website.menu_sorting');
			Route::match(['get', 'post'],'website/theme_option', 'FrontendSettingController@theme_option')->name('website.theme_option');

		});


		/** Teacher Route Group **/
		Route::group(['middleware' => ['teacher']], function () {
			Route::get('teacher/my_profile', 'Users\TeacherController@my_profile');
			Route::get('teacher/assignments', 'Users\TeacherController@assignments');
			Route::get('teacher/create_assignment', 'Users\TeacherController@create_assignment');
			Route::post('teacher/store_assignment', 'Users\TeacherController@store_assignment');
			Route::get('teacher/edit_assignment/{id}', 'Users\TeacherController@edit_assignment');
			Route::get('teacher/assignment/{id}', 'Users\TeacherController@show_assignment');
			Route::post('teacher/update_assignment/{id}', 'Users\TeacherController@update_assignment');
			Route::get('teacher/destroy_assignment/{id}', 'Users\TeacherController@destroy_assignment');
		});


		/** Student Route Group **/
		Route::group(['middleware' => ['student']], function () {
			Route::get('student/my_profile', 'Users\StudentController@my_profile');
			Route::get('student/my_assignment', 'Users\StudentController@my_assignment');
			Route::get('student/view_assignment/{id?}', 'Users\StudentController@view_assignment');
		});


		/** Parent Route Group **/
		Route::group(['middleware' => ['parent']], function () {
			Route::get('parent/my_profile', 'Users\ParentController@my_profile');
			Route::get('parent/my_children/{student_id?}', 'Users\ParentController@my_children');
			Route::match(['get', 'post'],'parent/children_attendance/{student_id?}', 'Users\ParentController@children_attendance');
			Route::get('parent/progress_card/{student_id?}', 'Users\ParentController@progress_card');
		});

	});

});
	
