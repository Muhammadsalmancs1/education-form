<?php

namespace App\Models\registration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookingleavedate_model extends Model
{
    use HasFactory;
    protected $table = "booking_leavedate";
    protected $fillable=[
        'leave_date',
        'status',
    ];
}
