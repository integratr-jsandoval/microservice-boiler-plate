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

    public function __construct(TitleService $titleService)
    {
         $this->titleService = $titleService;
    }

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

    public function showTitle(string $titleId)
    {
        $title = $this->titleService->showTitle($titleId);
        return new TitleResource($title);
    }
    public function deleteTitle(string $titleId)
    {
        $title = $this->titleService->deleteTitle($titleId);
    }

    public function updateTitle(TitleStoreRequest $request, string $titleId)
    {
        $title = $this->titleService->updateTitle($request->validated(), $titleId);
        return new TitleResource($title);
    }
}
