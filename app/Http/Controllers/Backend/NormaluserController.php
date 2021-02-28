<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class NormaluserController extends Controller
{
     public function index()
    {
        $data['users'] = User::where('usertype', 2)->latest()->get();
        return view('backend.normaluser.index-normaluser',$data);
    }
    
    public function destroy($id)
    {
        User::find($id)->delete();
        $notification = array(
            'message' => 'User deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
