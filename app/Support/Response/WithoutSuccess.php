<?php
namespace App\Support\Response;

use Zend\Diactoros\Response\JsonResponse;

class WithoutSuccess extends JsonResponse
{
    public function __construct($data)
    {
        parent::__construct(['success' => false, 'data' => $data], 400, [], self::DEFAULT_JSON_FLAGS);
    }
}
