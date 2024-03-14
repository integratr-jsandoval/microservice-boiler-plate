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
     * Store data
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
     * Collection of data
     *
     * @return DepartmentResource
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
     * @return DepartmentResource
     */
    public function showDepartment(string $deptId): DepartmentResource
    {
        $department = $this->departmentService->showDepartment($deptId);
        return new DepartmentResource($department);
    }
    /**
     * Delete data
     *
     * @param string $deptId
     *
     * @return DepartmentResource
     */
    public function deleteDepartment(string $deptId)
    {
        $department = $this->departmentService->deleteDepartment($deptId);
        return response()->json(['message' => 'Successfully Deleted!'], 200);
    }
    /**
     * Update data
     *
     * @param DepartmentStoreRequest $request
     * @param string $deptId
     *
     * @return DepartmentResource
     */
    public function updateDepartment(DepartmentStoreRequest $request, string $deptId): DepartmentResource
    {
        $department = $this->departmentService->updateDepartment($request->validated(), $deptId);
        return new DepartmentResource($department);
    }
}
