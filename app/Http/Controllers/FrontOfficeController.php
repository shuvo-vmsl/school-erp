<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdmissionEnquiry;
use App\VisitorInformation;
use App\PhoneCallLog;
use App\Complain;

class FrontOfficeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = '')
    {
    	$admission_enquiries = AdmissionEnquiry::where('session_id',get_option('academic_year'))
                                                ->orderBy('id','DESC')
                                                ->get();
    	$visitor_informations = VisitorInformation::where('session_id',get_option('academic_year'))
                                                    ->orderBy('id','DESC')
                                                    ->get();
    	$phone_call_logs = PhoneCallLog::where('session_id',get_option('academic_year'))
                                        ->orderBy('id','DESC')
                                        ->get();
    	$complains = Complain::where('session_id',get_option('academic_year'))
                                ->orderBy('id','DESC')
                                ->get();
        return view('backend.frontoffice.index',compact('page','admission_enquiries','visitor_informations','phone_call_logs','complains'));
    }
}
