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
     * Store data
     *
     * @param array $payload
     *
     * @return Employee
     */
    public function storeEmployee(array $payload): Employee
    {
        try {
            return $employee = Employee::create($payload);
        } catch (QueryException $th) {
                throw new CreateException($th);
        }
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
        // $employee = Employee::findOrFail($employeeId);
        // return $employee;
        return $this->findOrFailEmployee($employeeId);
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
        $employee = $this->findOrFailEmployee($employeeId);
        $employee->delete();
        return $employee;
    }
    /**
     * Update Data
     *
     * @param array $payload
     * @param string $employeeId
     *
     * @return Employee
     */
    public function updateEmployee(array $payload, string $employeeId): Employee
    {
        $employee = $this->findOrFailEmployee($employeeId);
        try {
            $employee->update($payload);
        } catch (QueryException $th) {
            throw new UpdateException($th);
        }
        return $employee;
    }
    /**
     * Find Or Fail Handler
     *
     * @param string $employeeId
     *
     * @return Employee
     */
    public function findOrFailEmployee(string $employeeId): Employee
    {
        try {
            return Employee::findOrFail($employeeId);
        } catch (ModelNotFoundException $th) {
                throw new NotFoundException($th);
        }
    }
    public function paginateEmployee()
    {
        //
    }
}
