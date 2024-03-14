<?php

namespace MicroService\App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Employee extends Model
{
    use HasUuids;
    use SearchableTrait;

    public const RESOURCE_KEY = 'employees';
    protected $table = self::RESOURCE_KEY;
    protected $keyType = 'string';

    protected $fillable = [
        'first_name',
        'last_name',
    ];

    protected $searchable = [
        'columns' => [
            self::RESOURCE_KEY . '.first_name' => 10,
            self::RESOURCE_KEY . '.last_name' => 10,
        ]
    ];
}
