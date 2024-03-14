<?php

namespace MicroService\App\Services;

use Illuminate\Http\Resources\Json\ResourceCollection;
use MicroService\App\Models\Title;

class TitleService
{
    /**
     * Store
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
     * Collection of the list
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
     * @return void
     */
    public function showTitle(string $titleid)
    {
        $title = Title::findOrFail($titleid);
        return $title;
    }
    /**
     * Delete
     *
     * @param string $titleid
     *
     * @return void
     */
    public function deleteTitle(string $titleid)
    {
        $title = Title::findOrFail($titleid);
        $title->delete();
        return $title;
    }
    /**
     * Update
     *
     * @param array $payload
     * @param string $titleid
     *
     * @return void
     */
    public function updateTitle(array $payload, string $titleid)
    {
        $title = Title::where('id', $titleid)->firstOrFail();
        $title->update($payload);
        return $title;
    }
}
