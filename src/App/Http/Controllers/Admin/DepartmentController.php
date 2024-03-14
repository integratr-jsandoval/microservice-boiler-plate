<?php

namespace MicroService\App\Http\Controllers\Admin;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Laravel\Lumen\Routing\Controller as BaseController;
// use MicroService\App\Contracts\DepartmentContract;
// use MicroService\App\Models\Department;
use MicroService\App\Requests\DepartmentStoreRequest;
use MicroService\App\Resources\DepartmentResource;
use MicroService\App\Services\DepartmentService;

class DepartmentController extends BaseController
{
    protected $departmentService;
/**
 * initialize department service
 *
 * @param DepartmentService $departmentService
 */
    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }
/**
 * Store Data from Department Table
 *
 * @param DepartmentStoreRequest $request
 *
 * @return DepartmentResource
 */
    public function storeDepartment(DepartmentStoreRequest $request): DepartmentResource
    {
        $department = $this->departmentService->storeDepartment($request->validated());
        return new DepartmentResource($department);
    }

    /**
     * Get Data from Department Table
     *
     * @return void
     */
    public function getDepartment()
    {
        $department = $this->departmentService->getDepartment();
        return DepartmentResource::collection($department);
    }

/**
 * Show Data from Department Table
 *
 * @param string $deptId
 *
 * @return void
 */
    public function showDepartment(string $deptId)
    {
        $department = $this->departmentService->showDepartment($deptId);
        return new DepartmentResource($department);
    }

/**
 * Delete Data from Department Table
 *
 * @param string $deptId
 *
 * @return void
 */
    public function deleteDepartment(string $deptId)
    {
        $department = $this->departmentService->deleteDepatment($deptId);
    }
/**
 * Update Data from Department Table
 *
 * @param DepartmentStoreRequest $request
 * @param string $deptId
 *
 * @return void
 */
    public function updateDepartment(DepartmentStoreRequest $request, string $deptId)
    {
        $department = $this->departmentService->updateDepartment($request->validated(), $deptId);
        return new DepartmentResource($department);
    }
}
