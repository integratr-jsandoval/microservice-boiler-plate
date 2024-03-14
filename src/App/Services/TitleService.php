<?php

namespace MicroService\App\Services;

use MicroService\App\Contracts\TitleContract;
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
        $title =Title::get();
        return $title;
    }
    public function showTitle(string $titleId)
    {
        $title = Title::findOrFail($titleId);
        return $title;
    }
    public function deleteTitle(string $titleId)
    {
        $title = Title::findOrFail($titleId);
        $title->delete();
        return $title;
    }

    public function updateTitle(array $payload, string $titleId)
    {
    $title = Title::where('id', $titleId)->firstOrfail();
    $title->update($payload);
    return $title;
}
}