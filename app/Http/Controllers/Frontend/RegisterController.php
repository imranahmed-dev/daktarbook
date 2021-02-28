<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use App\Models\Doctor;

class RegisterController extends Controller
{
    public function user_register_store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);

        $data = new User;
        $data->role = 2;
        $data->usertype = 2;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->gender = $request->gender;
        $data->password = bcrypt($request->password);
        $data->save();

        // $notification = array(
        //     'message' => 'Registration Successfully!',
        //     'alert-type' => 'success'
        //      );
        Auth::login($data, true);
        return redirect()->route('user.profile');
    }

    public function doctor_register_store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'doctor_name' => 'required',
            'gender' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'specialist_id' => 'required',
            'degree' => 'required',
            'designation' => 'required',
            'hospital_name' => 'required',
            'mobile_one' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'chamber_details' => 'required',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = new User;
        $data->role = 2;
        $data->usertype = 3;
        $data->name = $request->doctor_name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        
        $data->save();

        $doctor = new Doctor();
        $doctor->doctor_id             = $data->id;
        $doctor->doctor_name           = $request->doctor_name;
        $doctor->gender                = $request->gender;
        $doctor->division_id           = $request->division_id;
        $doctor->district_id           = $request->district_id;
        $doctor->specialist_id         = $request->specialist_id;
        $doctor->degree                = $request->degree;
        $doctor->designation           = $request->designation;
        $doctor->hospital_name         = $request->hospital_name;
        $doctor->bmdc_no               = $request->bmdc_no;
        $doctor->mobile_one            = $request->mobile_one;
        $doctor->mobile_two            = $request->mobile_two;
        $doctor->email                 = $data->email;
        $doctor->chamber_details       = $request->chamber_details;
        $doctor->description           = $request->description;
        $doctor->status                = 1;

        // Default image
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/doctor'), $imageName);
            $doctor->image = '/uploaded/doctor/' . $imageName;
        }

        $doctor->save();

        Auth::login($data, true);
        return redirect()->route('user.profile');
    }
}
