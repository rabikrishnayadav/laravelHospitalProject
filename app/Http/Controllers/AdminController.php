<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function addview(){

        return view('admin.add_doctor');
    }
}
