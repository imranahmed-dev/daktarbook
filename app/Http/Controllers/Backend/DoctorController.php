<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use App\Models\Doctor;
use App\Models\Division;
use App\Models\District;
use App\Models\Specialist;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['doctors'] = Doctor::latest()->get();
        return view('backend.doctor.index-doctor', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['divisions'] = Division::all();
        $data['districts'] = District::all();
        $data['specialists'] = Specialist::all();
        return view('backend.doctor.create-doctor', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            'chamber_details' => 'required',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $doctor = new Doctor();
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
        $doctor->status                = $request->status;

        // Default image
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/doctor'), $imageName);
            $doctor->image = '/uploaded/doctor/' . $imageName;
        }

        $doctor->save();

        $notification = array(
            'message' => 'Doctor created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['doctor'] = Doctor::find($id);
        return view('backend.doctor.show-doctor', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['doctor'] = Doctor::find($id);
        $data['divisions'] = Division::all();
        $data['districts'] = District::all();
        $data['specialists'] = Specialist::all();
        return view('backend.doctor.edit-doctor', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        $doctor->status                = $request->status;

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
            'message' => 'Doctor updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::onlyTrashed()->find($id);
        $image_path = public_path($doctor->image);
        @unlink($image_path);
        
        $doctor->forceDelete();

        $notification = array(
            'message' => 'Doctor deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function soft_delete($id){
        Doctor::find($id)->delete();
        $notification = array(
            'message' => 'Successfully move to trashed!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function trashed_index(){
        $data['doctors'] = Doctor::onlyTrashed()->latest()->get();
        return view('backend.doctor.trashed-doctor',$data);
    }

    public function doctor_restore($id){
        Doctor::withTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Doctor restored successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function doctor_status(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        $doctor->status = $request->status;
        $doctor->save();

        $notification = array(
            'message' => 'Status changed successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function pending(){
        $data['doctors'] = Doctor::where('status',1)->latest()->get();
        return view('backend.doctor.pending-doctor',$data);
    }
    public function approved(){
        $data['doctors'] = Doctor::where('status',2)->latest()->get();
        return view('backend.doctor.approved-doctor',$data);
    }
}
