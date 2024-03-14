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
     * @return Employee
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
     * @return Employee
     */
    public function showEmployee(string $employeeId): Employee
    {
        $employee = Employee::findOrFail($employeeId);
        return $employee;
    }

        /**
        * delete data using id
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
     * update data using id
     *
     * @param array $payload
     * @param string $employeeId
     *
     * @return Employee
     */
    public function updateEmployee(array $payload, string $employeeId): Employee
    {
        $employee = Employee::where('id', $employeeId)->firstOrfail();
        $employee->update($payload);
        return $employee;
    }
}
