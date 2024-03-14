<?php

namespace MicroService\App\Http\Controllers\Admin;

use Laravel\Lumen\Routing\Controller as BaseController;
use MicroService\App\Requests\TitleStoreRequest;
use MicroService\App\Resources\TitleResource;
use MicroService\App\Services\TitleService;

class TitleController extends BaseController
{
    protected $titleService;

    /**
     * initialize employee service
     *
     * @param TitleService $titleService
     */
    public function __construct(TitleService $titleService)
    {
        $this->titleService = $titleService;
    }
    /**
     * Store data
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
     * Collection of data
     *
     * @return TitleResource
     */
    public function getTitle()
    {
        $title = $this->titleService->getTitle();
        return TitleResource::collection($title);
    }
    /**
     * Show specific list using id.
     *
     * @param string $titleid
     *
     * @return TitleResource
     */
    public function showTitle(string $titleid): TitleResource
    {
        $title = $this->titleService->showTitle($titleid);
        return new TitleResource($title);
    }
    /**
     * Delete data
     *
     * @param string $titleid
     *
     * @return TitleResource
     */
    public function deleteTitle(string $titleid)
    {
        $title = $this->titleService->deleteTitle($titleid);
        return response()->json(['message' => 'Successfully Deleted!'], 200);
    }
    /**
     * Update data
     *
     * @param TitleStoreRequest $request
     * @param string $titleid
     *
     * @return TitleResource
     */
    public function updateTitle(TitleStoreRequest $request, string $titleid): TitleResource
    {
        $title = $this->titleService->updateTitle($request->validated(), $titleid);
        return new TitleResource($title);
    }
}
