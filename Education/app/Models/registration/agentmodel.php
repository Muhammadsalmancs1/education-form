<?php

namespace App\Models\registration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agentmodel extends Model
{
    use HasFactory;
    protected $table = "agents";
    protected $fillable=[
        'agent',
        'status',
    ];
}
