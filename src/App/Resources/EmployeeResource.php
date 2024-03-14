<?php

namespace MicroService\App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'department_id' => $this->department_id,
            'employee_id' => $this->employee_id,
            'fistname' => $this->first_name,
            'lastname' => $this->last_name,
            'middlename' => $this->middle_name,
            'contact' => $this->contact,
            'address' => $this->address

        ];
    }
}
