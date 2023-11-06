<?php

namespace Support\Flash;

class FlashMessage
{
    public function __construct(protected string $message, protected string $class)
    {
    }

    public function messsage(): string
    {
        return $this->message;
    }

    public function class(): string
    {
        return $this->class;
    }
}
