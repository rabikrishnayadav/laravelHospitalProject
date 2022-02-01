<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appoinment;
use Notification;
use App\Notifications\SendCustomerEmailNotification;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    function addview(){

        if (Auth::id()) {
            if (Auth::user()->usertype==1) {
                
                return view('admin.add_doctor');
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }

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

    public function viewAppoinments(){

        if (Auth::id()) {
            if (Auth::user()->usertype==1) {
                
            $data = Appoinment::all();
            return view('admin.show_appoinment', compact('data'));
                
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }

    }

    public function aproveAppoint($id){

        $data = Appoinment::find($id);

        $data->status = "Approved";
        $data->save();

        return redirect()->back();
    }

    public function cancelAppoint($id){

        $data = Appoinment::find($id);

        $data->status = "Canceled";
        $data->save();

        return redirect()->back();
    }

    public function showDoctor(){

        if (Auth::id()) {
            if (Auth::user()->usertype==1) {
                
            $data = Doctor::all();
            return view('admin.show_doctor', compact('data'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }
    }

    public function deleteDoctor($id){

        $data = Doctor::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function updateDoctor($id){

        $data = Doctor::find($id);
        return view('admin.update_doctor', compact('data'));
    }

    public function editDoctor(Request $request, $id){

        $doctor = Doctor::find($id);

        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;

        $image = $request->doctor_img;

        if ($image) {
            
        $imageNewName = time().'.'.$image->getClientOriginalExtension();

        $request->doctor_img->move('doctorimage',$imageNewName);

        $doctor->image = $imageNewName;
        
        }

        $doctor->save();
        return redirect()->back()->with('message','Doctor Updated Successfully');
    }

    public function viewEmailSendCustomer($id){

         if (Auth::id()) {
            if (Auth::user()->usertype==1) {
                
            $customer = Appoinment::find($id);
            return view('admin.email_send',compact('customer'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }

    }

    public function emailSendCustomer(Request $request, $id){

        $data = Appoinment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart
        ];

        Notification::send($data, new SendCustomerEmailNotification($details));

        return redirect()->back()->with('message','Email send is successful');
    }
}
