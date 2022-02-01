<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
class AdminController extends Controller
{
    function addview(){

        return view('admin.add_doctor');
    }

    function upload(Request $request){

        $doctor = new Doctor;

        $image = $request->doctor_img;

        $filename = time().'.'.$image->getClientoriginalExtension();

        $request->doctor_img->move('doctorimage',$filename);

        $doctor->image = $filename;

        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;
        $doctor->save();
        return redirect()->back()->with('message','Doctor Added Successfully');
    }
}
