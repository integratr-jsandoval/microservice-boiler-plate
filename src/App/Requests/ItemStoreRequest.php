<?php

namespace MicroService\App\Requests;

use Illuminate\Validation\Rule;
use MicroService\App\Requests\BaseRequest;

class ItemStoreRequest extends BaseRequest
{
    /**
     * get the validation rules that apply to the request
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'quantity_id' => ['required', Rule::exists('stocks', 'id'), 'uuid'],
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required']
        ];
    }
}
