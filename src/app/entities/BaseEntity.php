<?php

namespace PersonLinks\Internship\app\entities;

interface EntityHelpers
{
    public function toArray(): array;

    public function validate(array $data): bool;
}
