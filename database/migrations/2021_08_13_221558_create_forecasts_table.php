<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForecastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forecasts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('timestamp');
            $table->text('areaCode')->nullable();
            $table->text('near_surface_smoke_video_url_h264')->nullable();
            $table->text('near_surface_smoke_video_url_h265')->nullable();
            $table->text('near_surface_smoke_video_url_vp9')->nullable();
            $table->text('vertically_integrated_smoke_video_url_h264')->nullable();
            $table->text('vertically_integrated_smoke_video_url_h265')->nullable();
            $table->text('vertically_integrated_smoke_video_url_vp9')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forecasts');
    }
}
