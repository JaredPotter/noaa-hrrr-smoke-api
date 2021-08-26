<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    use HasFactory;

    protected $fillable = [
        'timestamp',
        'areaCode',
        'near_surface_smoke_video_url_h264',
        'near_surface_smoke_video_url_h265',
        'near_surface_smoke_video_url_vp9',
        'vertically_integrated_smoke_video_url_h264',
        'vertically_integrated_smoke_video_url_h265',
        'vertically_integrated_smoke_video_url_vp9',
    ];

    protected $dates = [
        'timestamp'
    ];
}
