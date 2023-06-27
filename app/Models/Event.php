<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable=[
        'event_poster',
        'event_title',
        'event_start_date',
        'event_end_date',
        'event_start_time',
        'event_end_time'
    ];
}
