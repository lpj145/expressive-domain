<?php
namespace ApiBase\Support\Response;

use Zend\Diactoros\Response\JsonResponse;

class Error extends JsonResponse
{
    public function __construct($message)
    {
        parent::__construct(['success' => false,'error' => $message], 500, [], self::DEFAULT_JSON_FLAGS);
    }
}
