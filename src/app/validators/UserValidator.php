<?php

declare(strict_types=1);

namespace PersonLinks\Internship\app\validators;

class UserValidator extends BaseValidator
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,user',
        ];
    }
}
