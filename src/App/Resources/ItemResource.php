<?php

namespace MicroService\App\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->module_id,
            'price' => $this->module_name,
            'date_created' => Carbon::parse($this->created_at)->format('m/d/Y h:i A'),
        ];
    }
}
