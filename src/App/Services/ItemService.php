<?php

namespace MicroService\App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Resources\Json\ResourceCollection;
use MicroService\App\Exceptions\CreateException;
use MicroService\App\Exceptions\NotFoundException;
use MicroService\App\Exceptions\UpdateException;
use MicroService\App\Models\Employee;
use MicroService\App\Models\Item;
use MicroService\App\Models\Title;
use PhpParser\Node\Stmt\TryCatch;

class ItemService
{
    /**
     * Store data
     *
     * @param array $payload
     *
     * @return Item
     */
    public function storeItem(array $payload): Item
    {
        try {
            return $item = Item::create($payload);
        } catch (QueryException $th) {
                throw new CreateException($th);
        }
        return $item;
    }
    /**
     * Update Data
     *
     * @param array $payload
     * @param string $itemid
     *
     * @return Item
     */
    public function updateItem(array $payload, string $itemid): Item
    {
        $item = $this->findOrFailItem($itemid);
        try {
            $item->update($payload);
        } catch (QueryException $th) {
            throw new UpdateException($th);
        }
        return $item;
    }
    /**
     * Delete data
     *
     * @param string $itemid
     *
     * @return Item
     */
    public function deleteItem(string $itemid): Item
    {
        $item = $this->findOrFailItem($itemid);
        $item ->delete();
        return $item;
    }
    /**
     * Show specific id
     *
     * @param string $itemid
     *
     * @return Item
     */
    public function showItem(string $itemid): Item
    {
        return $this->findOrFailItem($itemid);
    }
    /**
     * Collection of Data's
     *
     * @return void
     */
    public function getItem()
    {
        $item = Item::get();
        return $item;
    }
    /**
     * Fail items
     *
     * @param string $itemid
     *
     * @return Item
     */
    public function findOrFailItem(string $itemid): Item
    {
        try {
            return Item::findOrFail($itemid);
        } catch (ModelNotFoundException $th) {
                throw new NotFoundException($th);
        }
    }
}
