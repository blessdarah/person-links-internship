<?php

namespace PersonLinks\Internship\app\entities;

use BlakvGhost\PHPValidator\Validator;

class User implements EntityHelpers
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public string $password,
        public string $salt,
        public ?\DateTime $verifiedOn,
        public ?string $verificationToken,
        public \DateTime $createdAt,
        public \DateTime $updatedAt,
    ) {}

    public function validate(array $data): bool
    {
        $validator = new Validator($data, [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        return $validator->isValid();
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'salt' => $this->salt,
            'verifiedOn' => $this->verifiedOn,
            'verificationToken' => $this->verificationToken,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }
}
