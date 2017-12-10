<?php
namespace ApiBase\Units\Consumers\Middleware;

use ApiBase\Domains\Consumers\Repositories\ConsumerRepository;
use ApiBase\Support\Response\Unauthorized;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AuthorizeConsumer implements MiddlewareInterface
{
    /**
     * @var ConsumerRepository
     */
    private $repository;

    public function __construct(ConsumerRepository $repository)
    {
        $this->repository = $repository;
    }


    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $key = $request->getHeaderLine('x-api-key');

        if (
            empty($key) ||
            null === $consumer = $this->repository->getById($key)
        ) {
            return new Unauthorized();
        }

        return $delegate->process($request->withAttribute('consumer', $consumer));
    }

}
