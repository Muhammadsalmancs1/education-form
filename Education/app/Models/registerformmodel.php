<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registerformmodel extends Model
{
    use HasFactory;
    protected $table="registration_form";
    protected $primarykey="id";

    public function unilist(){
        return $this->hasOne('App\Models\registration\universitylistmodel','student_id','id');
    }
    public function followuplists(){
        return $this->hasOne('App\Models\registration\followcomments','student_id','id')->orderBy('id', 'desc')
        ->latest();
    }

}
