<?php

declare(strict_types=1);

namespace PersonLinks\Internship\app\core;

class Notification
{
    private string $type;
    private string $message;

    public function __construct(string $type, string $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
