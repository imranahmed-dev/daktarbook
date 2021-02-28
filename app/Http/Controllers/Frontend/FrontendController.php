<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Specialist;
use App\Models\Division;
use App\Models\District;
use App\Models\Blog;
use App\Models\FavouriteDoctor;
use App\User;
use Auth;
use Validator;

class FrontendController extends Controller
{
    public function index()
    {
        $data['doctors'] = Doctor::where('status', 2)->latest()->paginate(6);
        $data['blogs'] = Blog::where('status', 2)->latest()->paginate(4);
        $data['specialistss'] = Specialist::all();
        $data['specialists'] = Specialist::paginate(12);
        $data['divisions'] = Division::all();
        $data['districts'] = District::all();
        return view('frontend.home', $data);
    }
    public function all_doctor()
    {
        $data['doctors'] = Doctor::where('status', 2)->latest()->get();
        $data['specialists'] = Specialist::paginate(12);
        return view('frontend.all-doctor', $data);
    }
    public function doctor_details($id)
    {
        $data['recentblogs'] = Blog::latest()->get()->take(5);
        $data['doctor'] = Doctor::where('id', $id)->first();
        return view('frontend.doctor-details', $data);
    }
    public function blog_details($id)
    {
        $data['blog'] = Blog::where('id', $id)->first();
        $data['recentblogs'] = Blog::latest()->get()->take(5);

        return view('frontend.blog-details', $data);
    }
    public function all_specialist()
    {
        $data['specialists'] = Specialist::latest()->get();
        return view('frontend.all-specialist', $data);
    }
    public function all_blog()
    {
        $data['blogs'] = Blog::latest()->get();
        return view('frontend.all-blog', $data);
    }
    public function contact_us()
    {
        return view('frontend.contact');
    }
    public function district_doctor($id)
    {
        $data['district_name'] = District::where('id', $id)->first()->district_name;
        $data['doctors'] = Doctor::where('district_id', $id)->get();
        return view('frontend.district-doctor', $data);
    }



    public function privacy_policy()
    {
        return view('frontend.privacy-policy');
    }
    public function terms_condition()
    {
        return view('frontend.terms-condition');
    }
    public function about_us()
    {
        return view('frontend.about-us');
    }
    public function specialist_doctor($id)
    {
        $data['specialists'] = Specialist::paginate(12);
        $data['doctors'] = Doctor::where('specialist_id', $id)->latest()->get();
        $data['specialist_name'] = Specialist::where('id', $id)->first()->specialist_name;
        return view('frontend.specialist-doctor', $data);
    }
    public function search_doctor(Request $request)
    {
        if ($request->division_id == null && $request->district_id == null && $request->specialist_id == null) {
            $notification = array(
                'message' => 'Something went wrong, Please try again...!',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        } else {

            $division_id = $request->get('division_id');
            $district_id = $request->get('district_id');
            $specialist_id = $request->get('specialist_id');

            // $doctors = Doctor::where('division_id', 'like', '%' . $division_id . '%')->where('district_id', 'like', '%' . $district_id . '%')->where('specialist_id', 'like', '%' . $specialist_id . '%')->get();
           $doctors = Doctor::query()->where('division_id', 'LIKE', "{$division_id}")->where('district_id', 'LIKE', "{$district_id}")->where('specialist_id', 'LIKE', "{$specialist_id}")->get();

            return view('frontend.search-doctor')->with('doctors', $doctors);
        }
    }
    public function advance_search(Request $request)
    {
        if ($request->keyword == null) {
            $notification = array(
                'message' => 'Something went wrong, Please try again...!',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        } else {
            $keyword = $request->get('keyword');

            $division = Division::select('id')->where('division_name', 'like', '%' . $keyword . '%')->first();

            $district = District::select('id')->where('district_name', 'like', '%' . $keyword . '%')->first();

            $specialist = Specialist::select('id')->where('specialist_name', 'like', '%' . $keyword . '%')->first();


            if ($division != null) {

                $doctors = Doctor::where('division_id', 'like', '%' . $division->id . '%')->get();
                return view('frontend.search-doctor')->with('doctors', $doctors);
            } elseif ($district != null) {

                $doctors = Doctor::where('district_id', 'like', '%' . $district->id . '%')->get();
                return view('frontend.search-doctor')->with('doctors', $doctors);
            } elseif ($specialist != null) {
                $doctors = Doctor::where('specialist_id', 'like', '%' . $specialist->id . '%')->get();
                return view('frontend.search-doctor')->with('doctors', $doctors);
            } else {
                $doctors = Doctor::where('doctor_name', 'like', '%' . $keyword . '%')->orWhere('chamber_details', 'like', '%' . $keyword . '%')->orWhere('mobile_one', 'like', '%' . $keyword . '%')->orWhere('mobile_two', 'like', '%' . $keyword . '%')->get();
                return view('frontend.search-doctor')->with('doctors', $doctors);
            }
        }
    }

    public function userLogin()
    {
        return view('frontend.login');
    }
    public function doctor_register()
    {
        $data['divisions'] = Division::all();
        $data['districts'] = District::all();
        $data['specialists'] = Specialist::all();
        return view('frontend.doctor-register', $data);
    }
    public function user_register()
    {
        return view('frontend.user-register');
    }

    public function favourite_store($id)
    {

        if (Auth::check() && Auth::user()->usertype == 2) {

            $favCheck = FavouriteDoctor::where('user_id', Auth::user()->id)->where('doctor_id', $id)->count();


            if ($favCheck != 0) {
                $notification = array(
                    'message' => 'You are already added this doctor, Please check your favourite list!',
                    'alert-type' => 'error'
                );

                return redirect()->back()->with($notification);
            } else {
                $favourite = new FavouriteDoctor;
                $favourite->user_id = Auth::user()->id;
                $favourite->doctor_id = $id;
                $favourite->save();
                $notification = array(
                    'message' => 'Successfully added to favourite list!',
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification);
            }
        } elseif (Auth::check() && Auth::user()->usertype == 1) {
            $notification = array(
                'message' => 'This permission is only for users!',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        } elseif (Auth::check() && Auth::user()->usertype == 3) {
            $notification = array(
                'message' => 'This permission is only for users!',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Please login first!',
                'alert-type' => 'info'
            );

            return redirect()->route('user.login')->with($notification);
        }
    }
}
