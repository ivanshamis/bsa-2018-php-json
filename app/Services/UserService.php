<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Requests\SaveUserRequest;
use App\Entity\User;

class UserService implements UserServiceInterface
{
    public function findAll(): Collection
    {
        
    }

    public function findById(int $id): ?User
    {

    }

    public function save(SaveUserRequest $request): User
    {
        return new User();   
    }

    public function delete(int $id): void
    {
        
    }
}