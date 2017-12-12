<?php
namespace App\Units\Users\Routes;

use AuthExpressive\Controller\LoginController;
use AuthExpressive\Controller\MeController;
use AuthExpressive\Controller\RememberTokenController;
use AuthExpressive\Controller\UpdateMeController;
use AuthExpressive\Middleware\JwtMiddleware;
use AuthExpressive\Middleware\MeMiddleware;
use ExpressiveProvider\RouterProvider;

class Api extends RouterProvider
{
    public function register(): void
    {
        $this->addRoute('/login', LoginController::class, ['POST']);

        $this->addRoute('/remember', RememberTokenController::class, ['POST']);
        $this->addRoute('/updateme', UpdateMeController::class, ['PUT']);

        $this->addRoute('/me', [
            JwtMiddleware::class,
            MeMiddleware::class,
            MeController::class
        ], ['GET']);
    }

}
