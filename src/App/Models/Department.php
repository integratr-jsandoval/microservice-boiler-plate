<?php

namespace MicroService\App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasUuids;

    public const RESOURCE_KEY = 'departments';
    protected $table = self::RESOURCE_KEY;
    protected $Keytype = 'string';

    protected $fillable = [
        'code',
        'name',
        'location'
    ];
}
