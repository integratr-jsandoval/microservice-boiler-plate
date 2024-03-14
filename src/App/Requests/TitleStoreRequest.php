<?php

namespace MicroService\App\Requests;

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
            'name' => ['required'],
            'salary' => ['required']
        ];
    }
}
