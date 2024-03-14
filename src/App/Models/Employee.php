<?php

  namespace MicroService\App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

 class Employee extends Model
 {
  use HasUuids;
      //
      public const RESOURCE_KEY = 'employee';
      protected $table = self::RESOURCE_KEY;
      protected $keyType ='string';

      protected $fillable =[
        'employee_id',
          'first_name',
          'last_name',
          'middle_name',
          'contact',
          'address',


      ];
 }
