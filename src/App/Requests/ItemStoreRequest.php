<?php

namespace MicroService\App\Requests;

use MicroService\App\Requests\BaseRequest;

class ItemStoreRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'price' => ['int']
        ];
    }
}
