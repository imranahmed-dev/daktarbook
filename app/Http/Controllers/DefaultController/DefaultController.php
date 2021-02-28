<?php

namespace App\Http\Controllers\DefaultController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;

class DefaultController extends Controller
{
    public function get_district($id){
        $data = District::where('division_id',$id)->get();
        return response()->json($data);
    }
}
