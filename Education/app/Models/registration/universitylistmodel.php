<?php

namespace App\Models\registration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class universitylistmodel extends Model
{
    use HasFactory;
    protected $table = "universitylist";
    protected $fillable = [
        'student_id',
        'universityname',
        'applied_date',
        'offerstatus',
        'fee',
        'cas',
        'visa',
        'agent',
        'deposit',
        'medical',
        'action',
        'status',
    ];
}
