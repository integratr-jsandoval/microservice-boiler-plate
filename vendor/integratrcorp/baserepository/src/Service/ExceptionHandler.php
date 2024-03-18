<?php

namespace Integratrcorp\Baserepository\Service;

use Exception;
use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Throwable;

class ExceptionHandler extends Handler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param Throwable $exception
     * @return void
     * @throws Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Throwable $exception
     * @return array|JsonResponse
     */
    public function render($request, Throwable $exception)
    {
        $error = $this->convertExceptionToResponse($exception);
        $response = [];
        $code = $error->getStatusCode();

        if ($exception instanceof ValidationException) {
            $response['errors'] = $this->validationException($exception);
            $code = 422;
        } else {
            $default = [
                'code' => $code,
                'detail' => $exception->getMessage() ?:
                    'The URI requested is invalid or the resource requested does not exist.'
            ];

            $response['errors'] = [$default];
        }

        Log::info(json_encode($response));

        return response()->json($response, $code);
    }

    /**
     * Assign to response attribute the value to ValidationException.
     *
     * @param ValidationException $exception
     * @return array
     */
    public function validationException(ValidationException $exception)
    {
        return $this->jsonApiFormatErrorMessages($exception);
    }

    /**
     * Get formatted errors on standard code, field, message to each field with
     * error.
     *
     * @param  ValidationException $exception
     * @return array
     */
    public function formattedErrors(ValidationException $exception)
    {
        return $this->jsonApiFormatErrorMessages($exception);
    }

    /**
     * @param ValidationException $exception
     * @return array
     */
    public function jsonApiFormatErrorMessages(ValidationException $exception)
    {
        $validationMessages = $this->getTreatedMessages($exception);
        $validationFails = $this->getTreatedFails($exception);

        $errors = [];
        foreach ($validationMessages as $field => $messages) {
            foreach ($messages as $key => $message) {
                $attributes = $this->getValidationAttributes($validationFails, $key, $field);
                $error = [
                    'code'      => $attributes['code'],
                    'detail'    => $message,
                ];
                array_push($errors, $error);
            }
        }

        return $errors;
    }

    public function getValidationAttributes(array $validationFails, $key, $field)
    {
        return [
            'code' => 422,
            'title' => $this->getValidationTitle($validationFails, $key, $field),
        ];
    }

    public function getValidationTitle(array $validationFails, $key, $field)
    {
        return __('exception::exceptions.validation.title', [
            'fails' => array_keys($validationFails[$field])[$key],
            'field' => $field,
        ]);
    }

    /**
     * Get message based on exception type. If exception is generated by
     * $this->validate() from default Controller methods the exception has the
     * response object. If exception is generated by Validator::make() the
     * messages are getted different.
     *
     * @param  Exception $exception
     * @return array
     */
    public function getTreatedMessages($exception)
    {
        return $this->getMessagesFromValidator($exception);
    }

    public function getMessagesFromValidator($exception)
    {
        return $exception->validator->messages()->messages();
    }

    public function getTreatedFails($exception)
    {
        return $this->getFailsFromValidator($exception);
    }

    public function getFailsFromValidator($exception)
    {
        return $exception->validator->failed();
    }
}