<?php

namespace App\Models\registration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class universitymodel extends Model
{
    use HasFactory;
    protected $table = "university";
    protected $fillable=[
        'university',
        'status',
    ];
}
