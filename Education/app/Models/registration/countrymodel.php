<?php

namespace App\Models\registration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countrymodel extends Model
{
    use HasFactory;
    protected $table = "countries";
    protected $fillable=[
        'country',
        'status',
    ];
}
