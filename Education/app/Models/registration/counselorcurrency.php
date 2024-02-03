<?php

namespace App\Models\registration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class counselorcurrency extends Model
{
    use HasFactory;
    protected $table = "counselor";
    protected $fillable=[
        'currency',
        'status',
    ];
}
