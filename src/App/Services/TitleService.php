<?php

namespace MicroService\App\Services;

use Illuminate\Http\Resources\Json\ResourceCollection;
use MicroService\App\Models\Title;

class TitleService
{
    public function storeTitle(array $payload): Title
    {
        $title = Title::create($payload);
        return $title;
    }

    public function getTitle()
    {
        $title = Title::get();
        return $title;
    }

    public function showTitle(string $titleid)
    {
        $title = Title::findOrFail($titleid);
        return $title;
    }

    public function deleteTitle(string $titleid)
    {
        $title = Title::findOrFail($titleid);
        $title->delete();
        return $title;
    }

    public function updateTitle(array $payload, string $titleid)
    {
        $title = Title::where('id', $titleid)->firstOrFail();
        $title->update($payload);
        return $title;
    }
}
