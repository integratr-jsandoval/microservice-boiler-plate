<?php

namespace MicroService\App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Resources\Json\ResourceCollection;
use MicroService\App\Exceptions\CreateException;
use MicroService\App\Exceptions\NotFoundException;
use MicroService\App\Exceptions\UpdateException;
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
        try {
            return $department = Department::create($payload);
        } catch (QueryException $th) {
            throw new CreateException($th);
        }
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
        // $department = Department::findOrFail($deptId);
        // return $department;
        return $this->findOrFailDepartment($deptId);
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
        $department = $this->findOrFailDepartment($deptId);
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
        $department = $this->findOrFailDepartment($deptId);
        try {
            $department->update($payload);
        } catch (QueryException $th) {
            throw new UpdateException($th);
        }
        return $department;
    }
    public function findOrFailDepartment(string $deptId): Department
    {
        try {
            return Department::findOrFail($deptId);
        } catch (ModelNotFoundException $th) {
            throw new NotFoundException($th);
        }
    }
}
