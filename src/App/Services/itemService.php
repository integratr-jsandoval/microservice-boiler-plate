<?php

namespace MicroService\App\Services;

use MicroService\App\Contracts\ItemContract;
use MicroService\App\Models\Title;

class ItemService
{
    public function storeTitle(array $payload): Title
    {
        $title = Title::create($payload);
        return $title;
    }
}
