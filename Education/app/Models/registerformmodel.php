<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registerformmodel extends Model
{
    use HasFactory;
    protected $table="registration_form";
    protected $primarykey="id";

}
