<?php
namespace App\Support\Middleware;

use App\Support\Response\WithoutValidation;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Illuminate\Validation\Factory as Validation;
use Psr\Http\Message\ServerRequestInterface;

abstract class ValidationMiddleware implements MiddlewareInterface
{
    /**
     * @var Validation
     */
    private $validation;

    public function __construct(Validation $validation)
    {
        $this->validation = $validation;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $validator = $this->validation->make($request->getParsedBody(), $this->validate());

        if ($validator->fails()) {
            return new WithoutValidation($validator->messages());
        }

        return $delegate->process($request);
    }

    abstract protected function validate() : array ;
}
