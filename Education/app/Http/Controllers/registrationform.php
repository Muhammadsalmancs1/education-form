<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registrationform extends Controller
{
    public function counselor(){
        return view('admin/listing_counselor');
    }
    public function countries(){
        return view('admin/registration/country');
    }

    public function agent(){
        return view('admin/registration/agent');
    }
    public function references(){
        return view('admin/registration/reference');
    }
    public function session(){
        return view('admin/registration/session');
    }
    public function subagents(){
        return view('admin/registration/subagent');
    }
    public function universities(){
        return view('admin/registration/university');
    }
    public function booking_leave_date(){
        return view('admin/registration/booking_leave_date');
    }
    public function student_management(){
        return view('admin/registration/studentmanagement');
    }
}
