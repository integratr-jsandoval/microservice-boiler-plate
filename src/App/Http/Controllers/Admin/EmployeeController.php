<?php

namespace MicroService\App\Http\Controllers\Admin;

use Illuminate\Cache\ArrayStore;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Laravel\Lumen\Routing\Controller as BaseController;
use MicroService\App\Models\Employee;
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
     * Store data
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
     * Collection of data
     *
     * @return void
     */
    public function getEmployee()
    {
        $employee = $this->employeeService->getEmployee();
        return EmployeeResource::collection($employee);
    }
    /**
     * Show specific list using id
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
     * Delete data
     *
     * @param string $employeeId
     *
     * @return void
     */
    public function deleteEmployee(string $employeeId)
    {
        $employee = $this->employeeService->deleteEmployee($employeeId);
        return response()->json(['message' => 'Successfully Deleted!'], 200);
    }
    /**
     * Update data
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
