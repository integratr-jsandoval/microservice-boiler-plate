<?php

namespace MicroService\App\Services;

use Illuminate\Http\Resources\Json\ResourceCollection;
use MicroService\App\Models\Department;
use MicroService\App\Resources\DepartmentResource;

class DepartmentService
{
    public function storeDepartment(array $payload): Department
    {
        $department = Department::create($payload);
        return $department;
    }

    public function getDepartment()
    {
        $department = Department::get();
        return $department;
    }

    public function showDepartment(string $deptId)
    {
        $department = Department::findOrFail($deptId);
        return $department;
    }

    public function deleteDepartment(string $deptId)
    {
        $department = Department::findOrFail($deptId);
        $department->delete();
        return $department;
    }

    public function updateDepartment(array $payload, string $deptId)
    {
        $department = Department::where('id', $deptId)->firstOrFail();
        $department->update($payload);
        return $department;
    }
}
