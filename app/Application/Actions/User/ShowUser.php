<?php

declare(strict_types=1);

namespace App\Application\Actions\User;

use App\Application\Service\UserService;

class ShowUser
{
    private $builder;

    public function __construct(UserService $builder)
    {
        $this->builder = $builder;
    }

    public function showInfoUser()
    {
        return response()->json($this->builder->getCurrentUser());
    }


}