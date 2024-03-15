<?php

namespace MicroService\App\Services;

use MicroService\App\Models\Department;
use MicroService\App\Requests\DepartmentStoreRequest;

// use MicroService\App\Contracts\DepartmentContract;

class DepartmentService
{
    /**
     *store data
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
     *get data
     *
     * @return Department
     */
    public function getDepartment()
    {
        $department = Department::get();
        return $department;
    }
    /**
     * show list using id
     *
     * @param string $deptId
     *
     * @return Department
     */
    public function showDepartment(string $deptId): Department
    {
        $department = Department::findOrFail($deptId);
        return $department;
    }
   /**
    * deleting data using id
    *
    * @param string $deptId
    *
    * @return Department
    */
    public function deleteDepartment(string $deptId): Department
    {
        $department = Department::findOrFail($deptId);
        $department->delete();
        return $department;
    }
 /**
  * update data using id
  * @param array $payload
  * @param string $deptId
  *
  * @return Department
  */
    public function updateDepartment(array $payload, string $deptId): Department
    {
        $department = Department::where('id', $deptId)->firstOrfail();
        $department->update($payload);
        return $department;
    }
}
