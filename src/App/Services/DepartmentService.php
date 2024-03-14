<?php

namespace MicroService\App\Services;

use Illuminate\Http\Resources\Json\ResourceCollection;
use MicroService\App\Models\Department;
use MicroService\App\Resources\DepartmentResource;

class DepartmentService
{
    /**
     * Store
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
     * Collection of the list
     *
     * @return void
     */
    public function getDepartment()
    {
        $department = Department::get();
        return $department;
    }
    /**
     * Show specific list using id
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
    * Delete
    *
    * @param string $deptId
    *
    * @return void
    */
    public function deleteDepartment(string $deptId)
    {
        $department = Department::findOrFail($deptId);
        $department->delete();
        return $department;
    }
    /**
     * Update
     *
     * @param array $payload
     * @param string $deptId
     *
     * @return void
     */
    public function updateDepartment(array $payload, string $deptId)
    {
        $department = Department::where('id', $deptId)->firstOrFail();
        $department->update($payload);
        return $department;
    }
}
