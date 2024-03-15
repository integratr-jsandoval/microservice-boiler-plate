<?php

namespace MicroService\App\Services;

use Illuminate\Http\Resources\Json\ResourceCollection;
use MicroService\App\Models\Department;
use MicroService\App\Resources\DepartmentResource;

class DepartmentService
{
    /**
     * Store data
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
     * Collection of data
     *
     * @return Department
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
     * @return Department
     */
    public function showDepartment(string $deptId): Department
    {
        $department = Department::findOrFail($deptId);
        return $department;
    }
   /**
    * Delete data
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
     * Update data
     *
     * @param array $payload
     * @param string $deptId
     *
     * @return Department
     */
    public function updateDepartment(array $payload, string $deptId): Department
    {
        $department = Department::where('id', $deptId)->firstOrFail();
        $department->update($payload);
        return $department;
    }
}
