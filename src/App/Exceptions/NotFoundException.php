<?php

namespace MicroService\App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class NotFoundException extends Exception
{
    /**
     * @var ModelNotFoundException
     */
    private ModelNotFoundException $exception;

    /**
     * NotFoundException constructor.
     * @param ModelNotFoundException $exception
     */
    public function __construct(ModelNotFoundException $exception)
    {
        $this->exception = $exception;

        parent::__construct('Record not found.', 404);
    }
}
