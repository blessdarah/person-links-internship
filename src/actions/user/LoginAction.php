<?php

declare(strict_types=1);

namespace PersonLinks\Internship\actions\user;

use BlakvGhost\PHPValidator\Validator;
use PersonLinks\Internship\app\core\FormRequest;

class LoginAction
{
    public function __construct(
        private string $email,
        private string $password,
    ) {
    }

    public function execute(): bool
    {
        $values = FormRequest::only([
            'email',
            'password',
        ]);
        $validator = new Validator($values, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if (! $validator->isValid()) {
            // Handle validation failure (e.g., return errors to the user)
            return false;
        }
        $this->email = $values['email'];
        $this->password = $values['password'];
        // Here you would typically check the credentials against a database or an authentication service.
        // For demonstration purposes, we'll assume the credentials are valid.
        return true;
    }
}
