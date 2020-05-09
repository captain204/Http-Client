<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use GuzzleHttp\Exception\ClientException;
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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof ClientException) {
            return $this->handleClientException($exception, $request);
        }

        return parent::render($request, $exception);
    }

    /**
     * Handle correctly the exceptions when sending requests
     * @return \Illuminate\Http\Response
     */
    protected function handleClientException($exception, $request)
    {
        $code = $exception->getCode();

        $response = json_decode($exception->getResponse()->getBody()->getContents());
        $errorMessage = $response->error;

        switch ($code) {
            case Response::HTTP_UNAUTHORIZED:
                $request->session()->invalidate();

                if ($request->user()) {
                    Auth::logout();

                    return redirect()
                        ->route('welcome')
                        ->withErrors(['message' => 'The authentication failed. Please login again.']);
                }

                abort(500, 'Error authenticating the request. Try again later.');

            default:
                return redirect()->back()->withErrors(['message' => $errorMessage]);
        }
    }

}
