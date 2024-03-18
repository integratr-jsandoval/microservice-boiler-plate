<?php

namespace MicroService\App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Resources\Json\ResourceCollection;
use MicroService\App\Exceptions\CreateException;
use MicroService\App\Exceptions\NotFoundException;
use MicroService\App\Exceptions\UpdateException;
use MicroService\App\Models\Employee;
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
        try {
            return $title = Title::create($payload);
        } catch (QueryException $th) {
            throw new CreateException($th);
        }
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
        return $this->findOrFailTitle($titleid);
        //return $title;
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
        $title = $this->findOrFailTitle($titleid);
        try {
            $title->update($payload);
        } catch (QueryException $th) {
            throw new UpdateException($th);
        }
        return $title;
    }
    public function findOrFailTitle(string $titleid): Title
    {
        try {
            return Title::findOrFail($titleid);
        } catch (ModelNotFoundException $th) {
            throw new NotFoundException($th);
        }
    }
}
