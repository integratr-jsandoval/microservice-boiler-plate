<?php

namespace MicroService\App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Laravel\Lumen\Routing\Controller as BaseController;
use MicroService\App\Requests\EmloyeeStoreRequest;
use MicroService\App\Requests\PaginateFilterEmployeeRequest;
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
     * store
     *
     * @param EmloyeeStoreRequest $request
     *
     * @return EmployeeResource
     */
    public function storeEmployee(
        EmloyeeStoreRequest $request
    ): EmployeeResource {
        $employee = $this->employeeService->storeEmployees($request->validated());
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
        $this->employeeService->deleteEmployee($employeeId);
    }

    public function updateEmployee(
        EmloyeeStoreRequest $request,
        string $employeeId
    ) {
        $employee = $this->employeeService->updateEmployee($request->validated(), $employeeId);
        return new EmployeeResource($employee);
    }

    public function paginateEmployee(
        PaginateFilterEmployeeRequest $filter
    ): ResourceCollection {
        $employee = $this->employeeService->paginateEmployee($filter->validated());
        return EmployeeResource::collection($employee);
    }
}
