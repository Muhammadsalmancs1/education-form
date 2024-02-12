<?php

namespace App\Models\usermanage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
class manageusermodel extends Model
{
    use HasFactory, HasRoles;
    protected $table = "users";
    protected $fillable=[
        'name',
        'email',
        'password',
        'role',

    ];
}
