<?php

namespace Monitor\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class StatisticResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->data
        ];
    }

}