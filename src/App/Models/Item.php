<?php

namespace MicroService\App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasUuids;

    public const RESOURCE_KEY = 'items';
    protected $table = self::RESOURCE_KEY;
    protected $Keytype = 'string';

    protected $fillable = [
        "quantity_id",
        'name',
        'description',
        'price'
    ];
}
