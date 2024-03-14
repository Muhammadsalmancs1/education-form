<?php

namespace App\Http\Controllers;
use App\Models\registerformmodel;
use App\Models\registration\countrymodel;
use App\Models\registration\referencemodel;
use App\Models\registration\sessionmodel;
use App\Models\registration\bookingtimemodel;
use App\Models\registration\bookingleavedate_model;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;



class frontendcontroller extends Controller
{
    public function index(){
        $country = countrymodel::orderBy('id','Desc')->get();
        $reference = referencemodel::orderBy('id','Desc')->get();
        $session = sessionmodel::orderBy('id','Desc')->get();
        $time = bookingtimemodel::with('booktime')->orderBy('id','Desc')->get();
 $dates = bookingleavedate_model::pluck('leave_date')->toArray();
        return view('frontend/home',compact('country','reference','session','time','dates'));
    }

    public function registration_store(Request $req){
        $selectedCountries = $req->input('states');
        $interested_country = implode(',', $selectedCountries);
        $store = new registerformmodel;
        $store->Date = \DateTime::createFromFormat('m/d/Y', $req->date)->format('Y-m-d');
        $store->time = $req->time;
        $store->timeid = $req->timeid;
        $store->Meeting_type = $req->meetingtype;
        $store->Student_name = $req->name;
        $store->Student_email = $req->email;
        $store->Student_contact = $req->contact;
        $store->Student_address = $req->address;
        $store->Qualification_1 = $req->qualification_1;
        $store->Grade_1 = $req->grade_1;
        $store->Qualification_2 = $req->qualification_2;
        $store->Grade_2 = $req->grade_2;
        $store->Qualification_3 = $req->qualification_3;
        $store->Grade_3 = $req->grade_3;
        $store->Education_country = $req->country;
        $store->Interested_Country = $interested_country;
        $store->Session_Looking = $req->session;
        $store->Year = $req->year;
        $store->Courses = $req->course;
        $store->Courses_name = $req->score;
        $store->Refferene = $req->ref;
        $store->save();
        Alert::success('Register', 'Your Registration Form Successful');
        return redirect()->back();

    }

    public function updatetime(Request $request){
        $date = \DateTime::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
        $booktime = registerformmodel::where('Date',$date)->where('status','Pending')->get('timeid');
        $time = bookingtimemodel::orderBy('id','DESC')->get();
        $sametime = [];
        $differenttime = [];
        $timeids = $booktime->pluck('timeid')->toArray(); // Get the timeid values from the booktime collection
        
        $html = '';
        if ($booktime->isEmpty()) {
            foreach ($time as $t) {
                $html .= '<button type="button" class="me-2 main-btn2 mb-3" value="' . date("h:i A", strtotime($t->start_time)) . ' - ' . date("h:i A", strtotime($t->end_time)) . ',' . $t->id . '" onclick="addValueToForm(\'' . date("h:i A", strtotime($t->start_time)) . ' - ' . date("h:i A", strtotime($t->end_time)) . '\', ' . $t->id . ')">' . date("h:i A", strtotime($t->start_time)) . ' - ' . date("h:i A", strtotime($t->end_time)) . '</button>';
            }
        } else {
            foreach ($time as $t) {
                $buttonDisabled = false;
                foreach ($booktime as $bt) {
                    if ($t->id == $bt->timeid) {
                        $buttonDisabled = true;
                        break;
                    }
                }
        
                if ($buttonDisabled) {
                    $html .= '<button type="button" class="me-2 main-btn2 mb-3" style="text-decoration: line-through;" value="" disabled>' . date("h:i A", strtotime($t->start_time)) . ' - ' . date("h:i A", strtotime($t->end_time)) . '</button>';
                } else {
                    $html .= '<button type="button" class="me-2 main-btn2 mb-3" value="' . date("h:i A", strtotime($t->start_time)) . ' - ' . date("h:i A", strtotime($t->end_time)) . ',' . $t->id . '" onclick="addValueToForm(\'' . date("h:i A", strtotime($t->start_time)) . ' - ' . date("h:i A", strtotime($t->end_time)) . '\', ' . $t->id . ')">' . date("h:i A", strtotime($t->start_time)) . ' - ' . date("h:i A", strtotime($t->end_time)) . '</button>';
                }
            }
        }
        $html .= '<input type="hidden" id="timeInput" name="time" />
        <input type="hidden" id="timeid" name="timeid" />';
        echo $html;
        
  
}
}