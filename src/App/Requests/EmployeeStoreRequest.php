<?php
namespace MicroService\App\Requests;

use MicroService\App\Requests\BaseRequest;
use Symfony\Contracts\Service\Attribute\Required;

class EmployeeStoreRequest extends BaseRequest
{
    public function rules(): array
    {
        return[
            'department_id' =>  ['required'],
            'employee_id' =>  ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'middle_name' => ['required'],
            'contact' => ['required'],
            'address' => ['required']
        ];
    }
}
