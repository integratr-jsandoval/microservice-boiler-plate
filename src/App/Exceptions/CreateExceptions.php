<?php

namespace MicroService\App\Exceptions;

use Exception;
use Illuminate\Database\QueryException;
// use MicroService\App\Exceptions\CreateExceptions;

class CreateExceptions extends Exception
{
    /**
     * @var QueryException
     */
    private QueryException $exception;

    /**
     * CreateException constructor.
     * @param QueryException $exception
     */
    public function __construct(QueryException $exception)
    {
        $this->exception = $exception;

        parent::__construct('Create is invalid or otherwise cannot be served.', 400);
    }
}