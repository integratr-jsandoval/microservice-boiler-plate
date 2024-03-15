<?php

namespace MicroService\App\Services;

use Illuminate\Http\Resources\Json\ResourceCollection;
use MicroService\App\Models\Title;
use MicroService\App\Resources\TitleResource;

class TitleService
{
    /**
     * Store data
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
     * Collection of data
     *
     * @return void
     */
    public function getTitle()
    {
        $title = Title::get();
        return $title;
    }
    /**
     * Show specific list using id
     *
     * @param string $titleid
     *
     * @return Title
     */
    public function showTitle(string $titleid): Title
    {
        $title = Title::findOrFail($titleid);
        return $title;
    }
    /**
     * Delete data
     *
     * @param string $titleid
     *
     * @return Title
     */
    public function deleteTitle(string $titleid): Title
    {
        $title = Title::findOrFail($titleid);
        $title->delete();
        return $title;
    }
    /**
     * Update data
     *
     * @param array $payload
     * @param string $titleid
     *
     * @return Title
     */
    public function updateTitle(array $payload, string $titleid): Title
    {
        $title = Title::where('id', $titleid)->firstOrFail();
        $title->update($payload);
        return $title;
    }
}
