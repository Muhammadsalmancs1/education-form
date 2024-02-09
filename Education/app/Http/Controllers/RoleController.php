<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){

        return view('admin/roles_and_permission/user_roles');
    }
}
