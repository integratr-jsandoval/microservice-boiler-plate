<?php

namespace MicroService\App\Services;

use Illuminate\Http\Resources\Json\ResourceCollection;
use MicroService\App\Models\Employee;

class EmployeeService 
{
    public function storeEmployee(array $payload): Employee
    {
        $employee = Employee::create($payload);
        return $employee;
    }
    public function getEmployee()
    {
        $employee =Employee::get();
        return $employee;
    }
    public function showEmployee(string $employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        return $employee;
    }
    public function deletemployee(string $employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        $employee->delete();
        return $employee;
    }

    public function updateEmployee(array $payload, string $employeeId)
    {
    $employee = Employee::where('id', $employeeId)->firstOrfail();
    $employee->update($payload);
    return $employee;
}
}