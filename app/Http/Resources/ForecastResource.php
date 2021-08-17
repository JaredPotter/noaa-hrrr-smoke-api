<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ForecastResource extends JsonResource
{
    public function toArray($request)
    {
        $return = parent::toArray($request);
        $return['type'] = 'forecast';

        return $return;
    }
}
