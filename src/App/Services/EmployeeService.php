<?php

namespace MicroService\App\Services;

use Illuminate\Http\Resources\Json\ResourceCollection;
use MicroService\App\Models\Employee;

class EmployeeService
{
    /**
     * Store data
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
     * Collection of data
     *
     * @return Employee
     */
    public function getEmployee()
    {
        $employee = Employee::get();
        return $employee;
    }
    /**
     * Show specific list using id
     *
     * @param string $employeeId
     *
     * @return Employee
     */
    public function showEmployee(string $employeeId): Employee
    {
        $employee = Employee::findOrFail($employeeId);
        return $employee;
    }
    /**
     * Delete data
     *
     * @param string $employeeId
     *
     * @return Employee
     */
    public function deleteEmployee(string $employeeId): Employee
    {
        $employee = Employee::findOrFail($employeeId);
        $employee->delete();
        return $employee;
    }
    /**
     * Update data
     *
     * @param array $payload
     * @param string $employeeId
     *
     * @return Employee
     */
    public function updateEmployee(array $payload, string $employeeId): Employee
    {
        $employee = Employee::where('id', $employeeId)->firstOrFail();
        $employee->update($payload);
        return $employee;
    }
}
