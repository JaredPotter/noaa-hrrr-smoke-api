<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    use HasFactory;

    protected $fillable = [
        'timestamp',
        'near_surface_smoke_video_url',
        'vertically_integrated_smoke_video_url',
        'surface_visibility_video_url',
    ];

    protected $dates = [
        'timestamp'
    ];
}
