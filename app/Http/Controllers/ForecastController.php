<?php

namespace App\Http\Controllers;

use App\Http\Resources\ForecastResource;
use App\Models\Forecast;
use Illuminate\Http\Request;
use uhin\laravel_api\Helpers\UhinApi;

class ForecastController extends Controller
{

    /**
     * Get All
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $query = UhinApi::getQueryBuilder(Forecast::class);
        $query = UhinApi::parseAll($query, $request);

        $input = $request->input();
        $area = $input['area'];

        if ($area) {
            $query->where('areaCode', '=', $area);
        }

        return ForecastResource::collection($query->get());
    }

    /**
     * Get by Index
     *
     * @param Request $request
     * @param $forecastId
     * @return ForecastResource
     */
    public function show(Request $request, $forecastId)
    {
        $query = UhinApi::getQueryBuilder(Forecast::class);
        $query = UhinApi::parseFields($query, $request);
        return new ForecastResource($query->findOrFail($forecastId));
    }

    /**
     * Post by index
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //Validate required fields
        $validated = $request->validate([
            'data.timestamp' => 'required',
            'data.areaCode' => 'required',
            'data.near_surface_smoke_video_url_h264' => 'required',
            'data.near_surface_smoke_video_url_h265' => 'required',
            'data.near_surface_smoke_video_url_vp9' => 'required',
            'data.vertically_integrated_smoke_video_url_h264' => 'required',
            'data.vertically_integrated_smoke_video_url_h265' => 'required',
            'data.vertically_integrated_smoke_video_url_vp9' => 'required',
        ]);

        //Create new model and save
        $forecast = new Forecast;
        $forecast = UhinApi::fillModelFromValidator($forecast, $validated, 'data');
        $forecast->save();

        $forecast = Forecast::findOrFail($forecast->id);
        $resource = new ForecastResource($forecast);
        return $resource->response()->setStatusCode(201);
    }

    /**
     * Patch by index
     *
     * @param Request $request
     * @param Forecast $forecast
     * @return ForecastResource
     */
    public function update(Request $request, Forecast $forecast)
    {
        $forecast = UhinApi::fillModel($forecast, $request);
        $forecast->save();
        return new ForecastResource($forecast);
    }

    /**
     * Delete by index
     *
     * @param Forecast $forecast
     * @throws \Exception
     */
    public function destroy(Forecast $forecast)
    {
        $forecast->delete();
    }
}
