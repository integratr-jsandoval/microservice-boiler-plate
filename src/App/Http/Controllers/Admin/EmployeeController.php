<?php

namespace MicroService\App\Http\Controllers\Admin;

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
     * Store
     *
     * @param
     */
    public function storeEmployee(EmployeeStoreRequest $request): EmployeeResource
    {
        $employee = $this->employeeService->storeEmployee($request->validated());
        return new EmployeeResource($employee);
    }

    public function getEmployee()
    {
        $employee = $this->employeeService->getEmployee();
        return EmployeeResource::collection($employee);
    }

    public function showEmployee(string $employeeId)
    {
        $employee = $this->employeeService->showEmployee($employeeId);
        return new EmployeeResource($employee);
    }

    public function deleteEmployee(string $employeeId)
    {
        $employee = $this->employeeService->deleteEmployee($employeeId);
    }

    public function updateEmployee(EmployeeStoreRequest $request, string $employeeId)
    {
        $employee = $this->employeeService->updateEmployee($request->validated(), $employeeId);
        return new EmployeeResource($employee);
    }
}
