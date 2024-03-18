<?php
  namespace MicroService\App\Models;

// use Book;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasUuids;

    public const RESOURCE_KEY = 'books';
      protected $table = self::RESOURCE_KEY;
      protected $keyType = 'string';

      protected $fillable = [
          'name',
          'description',
      ];

}