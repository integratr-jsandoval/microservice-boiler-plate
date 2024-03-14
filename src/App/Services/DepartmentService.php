<?php

namespace MicroService\App\Services;

use MicroService\App\Models\Department;
use MicroService\App\Requests\DepartmentStoreRequest;

// use MicroService\App\Contracts\DepartmentContract;

class DepartmentService

{
   
    public function storeDepartment(array $payload): Department
    {
        $department = Department::create($payload);
        return $department;
    }
    public function getDepartment()
    {
        $department =Department::get();
        return $department;
    }
    public function showDepartment(string $deptId)
    {
        $department = Department::findOrFail($deptId);
        return $department;
    }
    public function deleteDepatment(string $deptId)
    {
        $employee = Department::findOrFail($deptId);
        $employee->delete();
        return $employee;
    }
 
    public function updateDepartment(array $payload, string $deptId)
    {
    $department = Department::where('id', $deptId)->firstOrfail();
    $department->update($payload);
    return $department;
}

}