<?php

namespace App\Models\registration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class followcomments extends Model
{
    use HasFactory;
    protected $table = "followupcomment";
    protected $fillable=[
        'student_id',
        'followup',
        'comment',
        'status',
    ];
}
