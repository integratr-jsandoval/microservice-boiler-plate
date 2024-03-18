<?php

namespace MicroService\App\Http\Controllers\Admin;

use Illuminate\Cache\ArrayStore;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Laravel\Lumen\Routing\Controller as BaseController;
use MicroService\App\Requests\ItemStoreRequest;
use MicroService\App\Resources\ItemResource;
use MicroService\App\Services\ItemService;

class ItemController extends BaseController
{
    protected $itemService;

    /**
     * initialize item service
     *
     * @param ItemService $itemService
     */
    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }
    /**
     * Store data
     *
     * @param ItemStoreRequest $request
     *
     * @return ItemResource
     */
    public function storeItem(ItemStoreRequest $request): ItemResource
    {
        $item = $this->itemService->storeItem($request->validated());
        return new ItemResource($item);
    }
    /**
     * Update Data
     *
     * @param ItemStoreRequest $request
     * @param string $itemid
     *
     * @return ItemResource
     */
    public function updateItem(ItemStoreRequest $request, string $itemid): ItemResource
    {
        $item = $this->itemService->updateItem($request->validated(), $itemid);
        return new ItemResource($item);
    }
    /**
     * Delete Data
     *
     * @param string $itemid
     *
     * @return JsonResponse
     */
    public function deleteItem(string $itemid): JsonResponse
    {
        $item = $this->itemService->deleteItem($itemid);
        return response()->json(['message' => 'Successfully Deleted!'], 200);
    }
    /**
     * Show specific id
     *
     * @param string $itemid
     *
     * @return ItemResource
     */
    public function showItem(string $itemid): ItemResource
    {
        $item = $this->itemService->showItem($itemid);
        return new ItemResource($item);
    }
    /**
     * Collection of Data's
     *
     * @return void
     */
    public function getItem()
    {
        $item = $this->itemService->getItem();
        return ItemResource::collection($item);
    }
}
