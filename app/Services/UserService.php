<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Requests\SaveUserRequest;
use App\Entity\User;

class UserService implements UserServiceInterface
{
    public function findAll(): Collection
    {
        return User::all();
    }

    public function findById(int $id): ?User
    {
        return User::find($id);
    }

    public function save(SaveUserRequest $request): User
    {
        return User::updateOrCreate(
            ['id' => $request->getId()],
            ['name' => $request->getName(), 'email' => $request->getEmail()]
        );
    }

    public function delete(int $id): void
    {
        User::destroy($id);
    }
}