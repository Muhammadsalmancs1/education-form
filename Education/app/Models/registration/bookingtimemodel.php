<?php

namespace App\Models\registration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookingtimemodel extends Model
{
    use HasFactory;
    protected $table = "bookingtime";
    protected $fillable=[
        'start_time',
        'end_time',
        'status',

    ];

    public function booktime(){
        return $this->hasMany('App\Models\registerformmodel','timeid','id');
    }
}
