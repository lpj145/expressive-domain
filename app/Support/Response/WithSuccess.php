<?php
namespace App\Support\Response;

use Zend\Diactoros\Response\JsonResponse;

class WithSuccess extends JsonResponse
{
    public function __construct($data, array $headers = [])
    {
        parent::__construct(['success' => true, 'data' => $data], 200, $headers, self::DEFAULT_JSON_FLAGS);
    }
}
