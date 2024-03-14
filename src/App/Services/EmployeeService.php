<?php

namespace MicroService\App\Services;

use Illuminate\Http\Resources\Json\ResourceCollection;
use MicroService\App\Models\Employee;

class EmployeeService
{
    /**
     * Store
     *
     * @param array $payload
     *
     * @return Employee
     */
    public function storeEmployee(array $payload): Employee
    {
        $employee = Employee::create($payload);
        return $employee;
    }
    /**
     * Collection of the list
     *
     * @return void
     */
    public function getEmployee()
    {
        $employee = Employee::get();
        return $employee;
    }
    /**
     * Show list using id
     *
     * @param string $employeeId
     *
     * @return void
     */
    public function showEmployee(string $employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        return $employee;
    }
    /**
     * Delete
     *
     * @param string $employeeId
     *
     * @return void
     */
    public function deleteEmployee(string $employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        $employee->delete();
        return $employee;
    }
    /**
     * Update
     *
     * @param array $payload
     * @param string $employeeId
     *
     * @return void
     */
    public function updateEmployee(array $payload, string $employeeId)
    {
        $employee = Employee::where('id', $employeeId)->firstOrFail();
        $employee->update($payload);
        return $employee;
    }
}
