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
     * Store
     *
     * @param
     */
    public function storeTitle(TitleStoreRequest $request): TitleResource
    {
        $title = $this->titleService->storeTitle($request->validated());
        return new TitleResource($title);
    }

    public function getTitle()
    {
        $title = $this->titleService->getTitle();
        return TitleResource::collection($title);
    }

    public function showTitle(string $titleid)
    {
        $title = $this->titleService->showTitle($titleid);
        return new TitleResource($title);
    }

    public function deleteTitle(string $titleid)
    {
        $title = $this->titleService->deleteTitle($titleid);
    }

    public function updateTitle(TitleStoreRequest $request, string $titleid)
    {
        $title = $this->titleService->updateTitle($request->validated(), $titleid);
        return new TitleResource($title);
    }
}
