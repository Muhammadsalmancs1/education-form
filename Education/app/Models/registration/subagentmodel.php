<?php

namespace App\Models\registration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subagentmodel extends Model
{
    use HasFactory;
    protected $table = "subagent";
    protected $fillable=[
        'subagent',
        'status',
    ];
}
