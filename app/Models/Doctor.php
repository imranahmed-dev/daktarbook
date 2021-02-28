<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{

    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    public function specialist(){
        return $this->belongsTo(Specialist::class,'specialist_id','id');
    }
    public function division(){
        return $this->belongsTo(Division::class,'division_id','id');
    }
    public function district(){
        return $this->belongsTo(District::class,'district_id','id');
    }
}
