<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void{

            // App::missing(function ($exception) {
            //     return redirect()->route('error.page');
            // });

            $this->reportable(function (Throwable $e) {
            
            });
    }


    // protected function unauthenticated($request, AuthenticationException $exception){
    //     if ($request->expectsJson()) {
    //         return response()->json(['error' => 'Unauthenticated.'], 401);
    //     }

    //     return redirect()->route('custom.error.page'); 
    // }


    public function render($request, ThrowablE $exception){
            if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
                // Handle missing files or code
                return redirect()->route('error.page');
            }

         return parent::render($request, $exception);
}


}
