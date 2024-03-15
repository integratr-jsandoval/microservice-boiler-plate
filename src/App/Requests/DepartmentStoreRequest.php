<?php
namespace MicroService\App\Requests;

use MicroService\App\Requests\BaseRequest;
use Symfony\Contracts\Service\Attribute\Required;

class DepartmentStoreRequest extends BaseRequest
{
    public function rules(): array
    {
        return[
            'code' =>  ['required'],
            'name' =>  ['required'],
            'location' =>  ['required']
        ];
    }
}
