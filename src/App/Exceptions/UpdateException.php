<?php

namespace MicroService\App\Exceptions;

use Exception;
use Illuminate\Database\QueryException;

class UpdateException extends Exception
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

        parent::__construct('Not updated, try again', 404);
    }
}
