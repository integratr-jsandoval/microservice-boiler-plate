<?php
namespace MicroService\App\Requests;

use Illuminate\Validation\Rule;
use MicroService\App\Requests\BaseRequest;
use Symfony\Contracts\Service\Attribute\Required;

class BookStoreRequest extends BaseRequest
{
    public function rules(): array
    {
        return[
            'name' => ['required'],
            'description' => ['required']
        ];
    }
}