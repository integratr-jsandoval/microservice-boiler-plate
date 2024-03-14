<?php

namespace MicroService\App\Http\Controllers\Admin;

use Laravel\Lumen\Routing\Controller as BaseController;
use MicroService\App\Requests\ItemStoreRequest;
use MicroService\App\Resources\ItemResource;
use MicroService\App\Services\ItemService;

class ItemController extends BaseController
{
    protected $itemService;

    /**
     *  Constructor
     * @param ItemService $itemService
     */
    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    /**
     * store items
     *
     * @param ItemContract $itemContract
     *
     * @return void
     */
    public function items(
        ItemStoreRequest $request
    ) {
        $item = $this->itemService->items($request->validated());
        return new ItemResource($item);
    }
}
