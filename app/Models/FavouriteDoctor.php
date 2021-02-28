<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavouriteDoctor extends Model
{
    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id','id');
    }
}
