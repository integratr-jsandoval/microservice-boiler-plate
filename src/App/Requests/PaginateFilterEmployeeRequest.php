<?php

namespace MicroService\App\Requests;

use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;
use MicroService\App\Models\Employee;
use MicroService\App\Requests\BaseRequest;

class PaginateFilterEmployeeRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'per_page' => ['nullable'],
            'order_by' => ['nullable', Rule::in($this->getColumns())],
            'sort_by' => ['required_with:order_by', 'in:asc,desc'],
            'data' => ['nullable']
        ];
    }

     /**
     * get column
     * @return void
     */
    public function getColumns()
    {
        $columns = Schema::getColumnListing(Employee::RESOURCE_KEY);

        return $columns;
    }
}