<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FavouriteDoctor;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Doctor;
use App\Models\Specialist;
use App\Models\Division;
use App\Models\District;
use Validator;


class DashboardController extends Controller
{
    public function user_dashboard()
    {
        return view('frontend.dashboard.dashboard');
    }
    public function user_profile()
    {
        $data['doctor'] = Doctor::where('doctor_id', Auth::user()->id)->first();
        return view('frontend.dashboard.user-profile',$data);
    }
    public function user_edit_profile()
    {
        $data['divisions'] = Division::all();
        $data['districts'] = District::all();
        $data['specialists'] = Specialist::all();
        $data['doctor'] = Doctor::where('doctor_id', Auth::user()->id)->first();
        return view('frontend.dashboard.user-edit-profile',$data);
    }

    public function user_update_profile(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
        $data = User::where('id', Auth::user()->id)->first();
        $data->name = $request->name;
        $data->mobile = $request->mobile;
        $data->gender = $request->gender;
        $data->email = $request->email;
        $data->address = $request->address;
        // Image
        $image = $request->file('image');
        if ($image) {
            $image_path = public_path($data->image);
            @unlink($image_path);
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/user'), $imageName);
            $data->image = '/uploaded/user/' . $imageName;
        }
        $data->save();

        $notification = array(
            'message' => 'Successfully Profile Updated!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function user_change_password()
    {
        $data['doctor'] = Doctor::where('doctor_id', Auth::user()->id)->first();
        return view('frontend.dashboard.user-change-password',$data);
    }

    public function user_update_password(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);

        if (Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])) {
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            $notification = array(
                'message' => 'Successfully password changed.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Sorry! Your current password dost not match.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function favourite_doctor()
    {
        $data['doctors'] = FavouriteDoctor::where('user_id', Auth::user()->id)->latest()->get();
        return view('frontend.dashboard.favourite.favourite-doctor', $data);
    }

    public function favourite_destroy($id)
    {
        FavouriteDoctor::find($id)->delete();
        $notification = array(
            'message' => 'Favourite doctor deleted successfully!.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function doctor_update_profile(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'doctor_name' => 'required',
            'gender' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'specialist_id' => 'required',
            'bmdc_no' => 'required',
            'degree' => 'required',
            'designation' => 'required',
            'hospital_name' => 'required',
            'mobile_one' => 'required',
            'email' => 'email',
            'chamber_details' => 'required',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $doctor = Doctor::find($id);
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
        $doctor->email                 = $request->email;
        $doctor->chamber_details       = $request->chamber_details;
        $doctor->description           = $request->description;

        // Default image
        $image = $request->file('image');
        if ($image) {
            $image_path = public_path($doctor->image);
            @unlink($image_path);
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/doctor'), $imageName);
            $doctor->image = '/uploaded/doctor/' . $imageName;
        }

        $doctor->save();

        $notification = array(
            'message' => 'Profile updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function doctor_change_email(Request $request, $id){
        $this->validate($request, [
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $doctor = Doctor::where('doctor_id',$id)->first();
        $doctor->email = $request->email;
        $doctor->save(); 
        
        $user = User::where('id',$id)->first();
        $user->email = $request->email;
        $user->save();

        $notification = array(
            'message' => 'Email updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

}
