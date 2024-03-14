<?php

namespace MicroService\App\Http\Controllers\Admin;

use Laravel\Lumen\Routing\Controller as BaseController;
use MicroService\App\Contracts\ItemContract;

class ItemController extends BaseController
{
    //
    /** */
    public function items(
        // ItemContract $itemContract,
        string $itemId
    ){
        dd($itemId);
     
    // $this->$itemContract->items();
    }

    
}
