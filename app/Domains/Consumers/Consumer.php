<?php
namespace ApiBase\Domains\Consumers;

use ApiBase\Support\Model\BaseModel;

class Consumer extends BaseModel
{
    protected $collection = 'consumers';
    protected $primaryKey = 'key';

    protected $fillable = [
        'key',
        'name',
        'active',
        'identifier'
    ];
}
