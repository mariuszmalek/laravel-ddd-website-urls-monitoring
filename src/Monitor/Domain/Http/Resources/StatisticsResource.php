<?php

namespace Monitor\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class StatisticsResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return new StatisticResource($request);
    }

}