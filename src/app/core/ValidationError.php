<?php

namespace PersonLinks\Internship\app\core;

class ValidationError
{
    public function __construct(
        public string $field = '',
        public string $message = ''
    ) {
    }
}
