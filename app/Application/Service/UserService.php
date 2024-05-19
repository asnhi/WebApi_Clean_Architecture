<?php

declare(strict_types=1);

namespace App\Application\Service;

use App\Domain\Entities\User;
use App\Domain\ValueObjects\UserValueObject;

class UserService {
    public function register(UserValueObject $data): User {
        $user = User::create($data->toArray());
        $user->save();
        return $user;
    }

    public function login(array $credentials)
    {
        if (!$token = auth()->attempt($credentials)) {
            return false;
        }

        return $token;
    }

    public function getCurrentUser()
    {
        return auth()->user();
    }
}
