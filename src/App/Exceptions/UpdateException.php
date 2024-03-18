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

<<<<<<< HEAD
        parent::__construct('invalid update.', 200);
=======
        parent::__construct('Not updated, try again', 404);
>>>>>>> 90174a0d37ce80d94d695288c09760ab47b61244
    }
}