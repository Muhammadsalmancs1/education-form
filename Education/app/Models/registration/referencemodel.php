<?php

namespace App\Models\registration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class referencemodel extends Model
{
    use HasFactory;
    protected $table = "reference";
    protected $fillable=[
        'reference',
        'status',
    ];
}
