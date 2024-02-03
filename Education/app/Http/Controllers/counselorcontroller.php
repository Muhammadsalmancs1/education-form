<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class counselorcontroller extends Controller
{
    public function index(){
        return view('admin/transection/assign_counselor');
    }
}
