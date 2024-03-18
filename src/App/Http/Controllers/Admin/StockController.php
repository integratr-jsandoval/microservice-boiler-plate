<?php

namespace MicroService\App\Http\Controllers\Admin;

use Illuminate\Cache\ArrayStore;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Laravel\Lumen\Routing\Controller as BaseController;
use MicroService\App\Requests\StockStoreRequest;
use MicroService\App\Resources\StockResource;
use MicroService\App\Services\StockService;

class StockController extends BaseController
{
    protected $stockService;

    /**
     * initialize stock service
     *
     * @param StockService $stockService
     */
    public function __construct(StockService $stockService)
    {
        $this->stockService = $stockService;
    }
    /**
     * Store Data
     *
     * @param StockStoreRequest $request
     *
     * @return StockResource
     */
    public function storeStock(StockStoreRequest $request): StockResource
    {
        $stock = $this->stockService->storeStock($request->validated());
        return new StockResource($stock);
    }
    /**
     * Update Data
     *
     * @param StockStoreRequest $request
     * @param string $stockid
     *
     * @return StockResource
     */
    public function updateStock(StockStoreRequest $request, string $stockid): StockResource
    {
        $stock = $this->stockService->updateStock($request->validated(), $stockid);
        return new StockResource($stock);
    }
    /**
     * Delete Data
     *
     * @param string $stockid
     *
     * @return JsonResponse
     */
    public function deleteStock(string $stockid): JsonResponse
    {
        $stock = $this->stockService->deleteStock($stockid);
        return response()->json(['message' => 'Successfully Deleted!'], 200);
    }
    /**
     * Show specific id
     *
     * @param string $stockid
     *
     * @return StockResource
     */
    public function showStock(string $stockid): StockResource
    {
        $stock = $this->stockService->showStock($stockid);
        return new StockResource($stock);
    }
    /**
     * Collection of Data's
     *
     * @return void
     */
    public function getStock()
    {
        $stock = $this->stockService->getStock();
        return StockResource::collection($stock);
    }
}
