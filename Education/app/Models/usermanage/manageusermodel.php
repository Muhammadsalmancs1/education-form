<?php

namespace App\Models\usermanage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manageusermodel extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $fillable=[
        'name',
        'email',
        'password',
        'role',

    ];
}
