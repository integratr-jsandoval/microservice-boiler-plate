<?php

namespace MicroService\App\Requests;

use MicroService\App\Requests\BaseRequest;

class EmployeeStoreRequest extends BaseRequest
{
    /**
     * get the validation rules that apply to the request
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'employee_id' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'middle_name' => ['required'],
            'contact' => ['required'],
            'address' => ['required']
        ];
    }
}
