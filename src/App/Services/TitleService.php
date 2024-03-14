<?php

namespace MicroService\App\Services;

use MicroService\App\Contracts\TitleContract;
use MicroService\App\Models\Title;

class TitleService

{
    /**
     * store data
     *
     * @param array $payload
     *
     * @return Title
     */
    public function storeTitle(array $payload): Title
    {
        $title = Title::create($payload);
        return $title;
    }
    /**
     * get data
     */
    public function getTitle()
    {
        $title =Title::get();
        return $title;
    }
    /**
     * show data using id
     *
     * @param string $titleId
     *
     * @return void
     */
    public function showTitle(string $titleId)
    {
        $title = Title::findOrFail($titleId);
        return $title;
    }
    /**
     * delete ing data using id
     *
     * @param string $titleId
     *
     * @return void
     */
    public function deleteTitle(string $titleId)
    {
        $title = Title::findOrFail($titleId);
        $title->delete();
        return $title;
    }
/**
 * update data using id
 *
 * @param array $payload
 * @param string $titleId
 *
 * @return void
 */
    public function updateTitle(array $payload, string $titleId)
    {
    $title = Title::where('id', $titleId)->firstOrfail();
    $title->update($payload);
    return $title;
}
}