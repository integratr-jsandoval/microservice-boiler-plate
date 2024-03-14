<?php
namespace MicroService\App\Requests;

use MicroService\App\Requests\BaseRequest;
use Symfony\Contracts\Service\Attribute\Required;

class TitleStoreRequest extends BaseRequest
{
    public function rules(): array
    {
        return[
            'name' =>  ['required'],
            'salary' =>  ['required']
        ];
    }
}
