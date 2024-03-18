<?php
  namespace MicroService\App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasUuids;

    public const RESOURCE_KEY = 'authors';
      protected $table = self::RESOURCE_KEY;
      protected $keyType = 'string';

      protected $fillable = [
          'first_name',
          'last_name',
          'authors_id'
      ];

}