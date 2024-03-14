<?php

namespace MicroService\App\Services;

use Illuminate\Http\Resources\Json\ResourceCollection;
use MicroService\App\Models\Employee;

class EmployeeService
{
    /**
     * store data
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
     * get data
     *
     * @return void
     */
    public function getEmployee()
    {
        $employee = Employee::get();
        return $employee;
    }
    /**
     * show data using id
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
     * delete data using id 
     *
     * @param string $employeeId
     *
     * @return void
     */
    public function deletemployee(string $employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        $employee->delete();
        return $employee;
    }
/**
 * update data using id
 *
 * @param array $payload
 * @param string $employeeId
 *
 * @return void
 */
    public function updateEmployee(array $payload, string $employeeId)
    {
        $employee = Employee::where('id', $employeeId)->firstOrfail();
        $employee->update($payload);
        return $employee;
    }
}