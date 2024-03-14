<?php

namespace MicroService\App\Http\Controllers\Admin;

use Laravel\Lumen\Routing\Controller as BaseController;
use MicroService\App\Contracts\TitleContract;
use MicroService\App\Requests\TitleStoreRequest;
use MicroService\App\Resources\TitleResource;
use MicroService\App\Services\TitleService;

class TitleController extends BaseController
{
    protected $titleService;
/**
 * initialize title service
 *
 * @param TitleService $titleService
 */
    public function __construct(TitleService $titleService)
    {
         $this->titleService = $titleService;
    }
/**
 * store data from title Table
 *
 * @param TitleStoreRequest $request
 *
 * @return TitleResource
 */
    public function storeTitle(TitleStoreRequest $request): TitleResource
    {
        $title = $this->titleService->storeTitle($request->validated());
        return new TitleResource($title);
    }
    /**
     * get data from title Table
     *
     * @return void
     */
    public function getTitle()
    {
        $title = $this->titleService->getTitle();
        return TitleResource::collection($title);
    }
/**
 * show data from title Table
 *
 * @param string $titleId
 *
 * @return void
 */
    public function showTitle(string $titleId)
    {
        $title = $this->titleService->showTitle($titleId);
        return new TitleResource($title);
    }
    /**
     * delete data from title Table
     *
     * @param string $titleId
     *
     * @return void
     */
    public function deleteTitle(string $titleId)
    {
        $title = $this->titleService->deleteTitle($titleId);
    }
/**
 * update data from title Table
 *
 * @param TitleStoreRequest $request
 * @param string $titleId
 *
 * @return void
 */
    public function updateTitle(TitleStoreRequest $request, string $titleId)
    {
        $title = $this->titleService->updateTitle($request->validated(), $titleId);
        return new TitleResource($title);
    }
}
