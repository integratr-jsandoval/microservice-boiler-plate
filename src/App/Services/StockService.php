<?php

namespace MicroService\App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Resources\Json\ResourceCollection;
use MicroService\App\Exceptions\CreateException;
use MicroService\App\Exceptions\NotFoundException;
use MicroService\App\Exceptions\UpdateException;
use MicroService\App\Models\Item;
use MicroService\App\Models\Stock;
use PhpParser\Node\Stmt\TryCatch;

class StockService
{
    /**
     * Store Data
     *
     * @param array $payload
     *
     * @return Stock
     */
    public function storeStock(array $payload): Stock
    {
        try {
            return $stock = Stock::create($payload);
        } catch (QueryException $th) {
                throw new CreateException($th);
        }
        return $stock;
    }
    /**
     * Update Data
     *
     * @param array $payload
     * @param string $stockid
     *
     * @return Stock
     */
    public function updateStock(array $payload, string $stockid): Stock
    {
        $stock = $this->findOrFailStock($stockid);
        try {
            $stock->update($payload);
        } catch (QueryException $th) {
            throw new UpdateException($th);
        }
        return $stock;
    }
    /**
     * Delete Data
     *
     * @param string $stockid
     *
     * @return Stock
     */
    public function deleteStock(string $stockid): Stock
    {
        $stock = $this->findOrFailStock($stockid);
        $stock ->delete();
        return $stock;
    }
    /**
     * Show specific id
     *
     * @param string $stockid
     *
     * @return Stock
     */
    public function showStock(string $stockid): Stock
    {
        return $this->findOrFailStock($stockid);
    }
    /**
     * Collection of Data's
     *
     * @return Stock
     */
    public function getStock(): Stock
    {
        $stock = Stock::get();
        return $stock;
    }
    /**
     * Fail Stock
     *
     * @param string $stockid
     *
     * @return Stock
     */
    public function findOrFailStock(string $stockid): Stock
    {
        try {
            return Stock::findOrFail($stockid);
        } catch (ModelNotFoundException $th) {
                throw new NotFoundException($th);
        }
    }
}
