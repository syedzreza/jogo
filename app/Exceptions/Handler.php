<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Request;

class Handler extends ExceptionHandler
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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if($this->isHttpException($exception))
        {
            switch ($exception->getStatusCode())
            {
                // not found
                case 404:
                    $segment= Request::segment(2);
                    if($segment=='admin'){
                        return response()->make(view('admin.error_page.index'), 404);
                    }else{
                        return response()->make(view('frontend.error_page.index'), 404);
                    }

                    break;

                // internal error
                case '500':
                    $segment= Request::segment(2);
                    if($segment=='admin'){
                        return response()->make(view('admin.error_page.internal_error'), 500);
                    }else{
                        return response()->make(view('frontend.error_page.internal_error'), 500);
                    }
                    break;

                default:
                    return $this->renderHttpException($exception);
                    break;
            }
        }
        else
        {
            return parent::render($request, $exception);
        }
    }
}
