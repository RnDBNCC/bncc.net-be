<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_photo',
        'profile_name',
        'profile_division',
        'profile_sub_division',
        'profile_position',
        'profile_region',
        'profile_linkedin'
    ];
}
