<?php

namespace MicroService\App\Requests;

use Illuminate\Validation\Rule;
use MicroService\App\Requests\BaseRequest;

class TitleStoreRequest extends BaseRequest
{
    /**
     * get the validation rules that apply to the request
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'employee_id' => ['required', Rule::exists('employees', 'id'), 'uuid'],
            'name' => ['required'],
            'salary' => ['required']
        ];
    }
}
