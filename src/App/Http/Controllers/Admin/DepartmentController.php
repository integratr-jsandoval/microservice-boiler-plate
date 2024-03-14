<?php

namespace MicroService\App\Http\Controllers\Admin;

use Laravel\Lumen\Routing\Controller as BaseController;
use MicroService\App\Requests\DepartmentStoreRequest;
use MicroService\App\Resources\DepartmentResource;
use MicroService\App\Services\DepartmentService;

class DepartmentController extends BaseController
{
    protected $departmentService;

    /**
     * initialize employee service
     *
     * @param DepartmentService $departmentService
     */
    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }
    /**
     * Store
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
     * Collection of the list
     *
     * @return void
     */
    public function getDepartment()
    {
        $department = $this->departmentService->getDepartment();
        return DepartmentResource::collection($department);
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
        $department = $this->departmentService->showDepartment($deptId);
        return new DepartmentResource($department);
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
        $department = $this->departmentService->deleteDepartment($deptId);
    }
    /**
     * Update
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
