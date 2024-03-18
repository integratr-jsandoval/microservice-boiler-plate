<?php

namespace MicroService\App\Resources;

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
            'quantity_id' => $this->quantity_id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price
        ];
    }
}
