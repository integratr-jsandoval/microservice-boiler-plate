<?php

namespace MicroService\App\Services;

use MicroService\App\Models\Department;
use MicroService\App\Requests\DepartmentStoreRequest;

// use MicroService\App\Contracts\DepartmentContract;

class DepartmentService

{
    /**
     * store data 
     *
     * @param array $payload
     *
     * @return Department
     */
    public function storeDepartment(array $payload): Department
    {
        $department = Department::create($payload);
        return $department;
    }
    /**
     * get data
     *
     * @return void
     */
    public function getDepartment()
    {
        $department = Department::get();
        return $department;
    }
    /**
     * show list using ID
     *
     * @param string $deptId
     *
     * @return void
     */
    public function showDepartment(string $deptId)
    {
        $department = Department::findOrFail($deptId);
        return $department;
    }
    /**
     * deleting data using id
     *
     * @param string $deptId
     *
     * @return void
     */
    public function deleteDepatment(string $deptId)
    {
        $department = Department::findOrFail($deptId);
        $department->delete();
        return $department;
    }
/**
 * update data using id
 *
 * @param array $payload
 * @param string $deptId
 *
 * @return void
 */
    public function updateDepartment(array $payload, string $deptId)
    {
        $department = Department::where('id', $deptId)->firstOrfail();
        $department->update($payload);
        return $department;
    }

}