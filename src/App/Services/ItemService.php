<?php

namespace MicroService\App\Services;

use MicroService\App\Models\Item;

class ItemService
{
    public function items(array $payload)
    {
        $item = Item::create($payload);
        return $item;
    }
}
