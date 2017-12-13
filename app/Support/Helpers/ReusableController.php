<?php
namespace App\Support\Helpers;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;

abstract class ReusableController implements MiddlewareInterface
{
    /**
     * @var array
     */
    protected $mapMethods = [];

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $dictionary = [
            'GET' => 'index',
            'POST' => 'create',
            'PUT' => 'edit',
            'DELETE' => 'delete'
        ];

        if (is_array($this->mapMethods)) {
            $dictionary = array_merge($dictionary, $this->mapMethods);
        }

        if (method_exists($this, $dictionary[$request->getMethod()])) {
            return $this->{$dictionary[$request->getMethod()]}($request);
        }

        throw new \Exception('Not found action: '.$dictionary[$request->getMethod()].' on '.get_class($this));
    }
}
