<?php
namespace MicroService\App\Requests;

use Illuminate\Validation\Rule;
use MicroService\App\Requests\BaseRequest;
use Symfony\Contracts\Service\Attribute\Required;

class TitleStoreRequest extends BaseRequest
{
    public function rules(): array
    {
        return[
            'employee_id' => ['required', Rule::exists('employees', 'id', 'uuid')],
            'name' =>  ['required'],
            'salary' =>  ['required']
        ];
    }
}
