<?php

namespace MicroService\App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasUuids;

    public const RESOURCE_KEY = 'stocks';
    protected $table = self::RESOURCE_KEY;
    protected $Keytype = 'string';

    protected $fillable = [
        'name',
        'quantity'
    ];
}
