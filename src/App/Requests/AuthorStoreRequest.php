<?php
namespace MicroService\App\Requests;

use Illuminate\Validation\Rule;
use MicroService\App\Requests\BaseRequest;
use Symfony\Contracts\Service\Attribute\Required;

class AuthorStoreRequest extends BaseRequest
{
    public function rules(): array
    {
        return[
            'authors_id' =>['required'],
            'first_name' => ['required'],
            'last_name' => ['required']
        ];
    }
}