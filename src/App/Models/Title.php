<?php

namespace MicroService\App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasUuids;

    public const RESOURCE_KEY = 'titles';
    protected $table = self::RESOURCE_KEY;
    protected $Keytype = 'string';

    protected $fillable = [
        "employee_id",
        'name',
        'salary'
    ];
}
