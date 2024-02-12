<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
    public function index(){

        return view('admin/index');
    }

    public function mainsearch($mainsearch = null){
        return view('admin/registration/studentmanagement',compact('mainsearch'));
    }
}
