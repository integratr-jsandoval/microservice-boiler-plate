<?php

namespace MicroService\App\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Laravel\Lumen\Routing\Controller as BaseController;
use MicroService\App\Requests\EmployeeStoreRequest;
use MicroService\App\Resources\EmployeeResource;
use MicroService\App\Services\EmployeeService;

class EmployeeController extends BaseController
{
    protected $employeeService;

    /**
     * initialize employee service
     *
     * @param EmployeeService $employeeService
     */
    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }
    /**
     * store data
     *
     * @param EmployeeStoreRequest $request
     *
     * @return EmployeeResource
     */
    public function storeEmployee(EmployeeStoreRequest $request): EmployeeResource
    {
        $employee = $this->employeeService->storeEmployee($request->validated());
        return new EmployeeResource($employee);
    }
    /**
     * get data from employee Table
     *
     * @return EmployeeResource
     */
    public function getEmployee()
    {
        $employee = $this->employeeService->getEmployee();
        return EmployeeResource::collection($employee);
    }
    /**
     * show data from emmployee Table
     *
     * @param string $employeeId
     *
     * @return EmployeeResource
     */
    public function showEmployee(string $employeeId): EmployeeResource
    {
        $employee = $this->employeeService->showEmployee($employeeId);
        return new EmployeeResource($employee);
    }
    /**
     * delete data from emmployee Table
     *
     * @param string $employeeId
     *
     * @return JsonResponse
     */
    public function deleteEmployee(string $employeeId): JsonResponse
    {
        $employee = $this->employeeService->deleteEmployee($employeeId);
        return response()->json(['message' => 'Department Successfully Deleted!'], 200);
    }
    /**
     * update data from emmployee Table
     *
     * @param EmployeeStoreRequest $request
     * @param string $employeeId
     *
     * @return EmployeeResource
     */
    public function updateEmployee(EmployeeStoreRequest $request, string $employeeId): EmployeeResource
    {
        $employee = $this->employeeService->updateEmployee($request->validated(), $employeeId);
        return new EmployeeResource($employee);
    }
}
