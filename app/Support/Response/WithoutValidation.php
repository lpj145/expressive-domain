<?php
namespace App\Support\Response;

use Illuminate\Support\MessageBag;

class WithoutValidation extends WithoutSuccess
{
    public function __construct(MessageBag $bag)
    {
        parent::__construct(['errors' => $bag->count(), 'messages' => $bag->messages()]);
    }
}
