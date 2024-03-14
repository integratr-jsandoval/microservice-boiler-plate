<?php

namespace MicroService\App\Services;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use MicroService\App\Models\Employee;
use MicroService\App\Traits\PaginatedTrait;

class EmployeeService
{
    use PaginatedTrait;

    public function storeEmployees(array $payload): Employee
    {
        $employee = Employee::create($payload);
        return $employee;
    }

    public function getEmployee()
    {
        $employee = Employee::get();
        return $employee;
    }

    public function showEmployee(string $employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        return $employee;
    }

    public function deleteEmployee(string $employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        $employee->delete();
        return $employee;
    }

    public function updateEmployee(array $payload, string $employeeId)
    {
        $employee = Employee::where('id', $employeeId)->firstOrFail();
        $employee->update($payload);
        return $employee;
    }

    public function paginateEmployee(array $filter): LengthAwarePaginator
    {
        $formTemplates = Employee::query();

        $paginated = $this->paginateBuilder($formTemplates, $filter, 10);

        return $paginated;
    }
}
