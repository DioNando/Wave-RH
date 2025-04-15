<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

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
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $e
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Throwable $e)
    {
        // Gestion des erreurs d'authentification (401)
        if ($e instanceof AuthenticationException) {
            return $this->renderCustomErrorPage($request, $e, 401);
        }

        // Gestion des erreurs d'autorisation (403)
        if ($e instanceof AuthorizationException) {
            return $this->renderCustomErrorPage($request, $e, 403);
        }

        // Gestion des erreurs HTTP (404, 500, etc.)
        if ($e instanceof HttpException) {
            return $this->renderCustomErrorPage($request, $e, $e->getStatusCode());
        }

        // Erreur 500 pour les autres exceptions en production
        if (config('app.debug') === false) {
            return $this->renderCustomErrorPage($request, $e, 500);
        }

        return parent::render($request, $e);
    }

    /**
     * Render a custom error page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @param  int  $code
     * @return \Illuminate\Http\Response
     */
    protected function renderCustomErrorPage($request, Throwable $exception, int $code)
    {
        // Vérifiez si une vue spécifique existe pour ce code d'erreur
        if (view()->exists("errors.{$code}")) {
            return response()->view("errors.{$code}", [
                'exception' => $exception
            ], $code);
        }

        // Si aucune vue spécifique n'existe, utilisez la vue générique
        return response()->view('errors.error', [
            'exception' => $exception
        ], $code);
    }
}
