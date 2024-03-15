<?php

namespace MicroService\App\Services;

use MicroService\App\Contracts\ItemContract;

class ItemService implements ItemContract
{
    public function items()
    {
        dd('dasda');
    }
}
