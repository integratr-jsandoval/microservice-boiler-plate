<?php

namespace MicroService\App\Requests;

use MicroService\App\Requests\BaseRequest;

class DepartmentStoreRequest extends BaseRequest
{
    /**
     * get the validation rules that apply to the request
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'code' => ['required'],
            'name' => ['required'],
            'location' => ['required']
        ];
    }
}
