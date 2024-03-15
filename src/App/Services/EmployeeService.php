<?php

namespace MicroService\App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Resources\Json\ResourceCollection;
use MicroService\App\Exceptions\CreateException;
use MicroService\App\Exceptions\NotFoundException;
use MicroService\App\Exceptions\UpdateException;
use MicroService\App\Models\Employee;
use PhpParser\Node\Stmt\TryCatch;

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
        // $employee = Employee::create($payload);
        // return $employee;
        try {
             $employee = Employee::create($payload);
        } catch (QueryException $e) {
            throw new CreateException($e);
        }
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
        // $employee = Employee::findOrFail($employeeId);
        // return $employee;
        return $this->findOrFailemployee($employeeId);
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
         * update data exception 
         *
         * @param array $payload
         * @param string $employeeId
         *
         * @return Employee
         */
    public function updateEmployee(array $payload, string $employeeId): Employee
    {
        $employee = $this->findOrFailemployee($employeeId);
        try {
            $employee->update($payload);
        } catch (QueryException $e) {
            throw new UpdateException($e);
        }
            return $employee;
    }
/**
 * exception handler (show)
 *
 * @param string $employeeId
 *
 * @return Employee
 */
    public function findOrFailemployee(string $employeeId): Employee
    {
        // return  $employee = Employee::findOrFail($employeeId);
        try {
            return Employee::findOrFail($employeeId);
        } catch (ModelNotFoundException $e) {
            throw new NotFoundException($e);
        }
    }

    public function paginateEmployee()
    {
        //
    }
}
