<?php
declare(strict_types=1);
namespace App\Domain\ValueObjects;

class UserValueObject {
    public $name;
    public $email;
    public $gender;
    public $password;

    public function __construct(array $data)
    {
        // Assign values from data to properties
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->gender = $data['gender'] ?? null;
        $this->password = $data['password'];
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'password' => $this->password,
        ];
    }
}
