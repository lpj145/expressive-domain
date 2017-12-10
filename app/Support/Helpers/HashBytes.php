<?php
namespace ApiBase\Support\Helpers;

class HashBytes
{
    /**
     * @return string
     */
    static public function randomByte() : string
    {
        return bin2hex(random_bytes(25));
    }
}
