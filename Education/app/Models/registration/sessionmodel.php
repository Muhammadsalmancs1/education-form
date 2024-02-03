<?php

namespace App\Models\registration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sessionmodel extends Model
{
    use HasFactory;
    protected $table = "session";
    protected $fillable=[
        'session',
        'status',
    ];
}

