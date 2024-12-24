<?php

namespace App\Services\UserService;

use App\DTOs\UserCreateResponseDTO;
use App\DTOs\UserSearchDTO;
use App\DTOs\UserSearchResponseDTO;
use App\Events\UserCreated;
use App\Models\User;

class UserService implements UserServiceInterface
{
    public function createUser(CreateUserCommand $cmd): UserCreateResponseDTO
    {
        $cmd->dto->validate();

        $newUser = $cmd->dto->toModel(User::class);
        $newUser->save();
        $newUser->refresh();

        UserCreated::dispatch($newUser);

        return UserCreateResponseDTO::fromModel($newUser);
    }

    public function searchUser(SearchUserCommand $cmd): UserSearchResponseDTO
    {
        $dto = $cmd->dto;
        $dto->validate();

        $users = User::where('name', 'like', '%'.$dto->search.'%')
            ->orWhere('email', 'like', '%'.$dto->search.'%')
            ->orderby($dto->sort_by)
            ->withCount('orders')
            ->offset($cmd->perPage * ($dto->page - 1))
            ->limit($cmd->perPage)
            ->get();

        $result = [];
        foreach ($users as $user) {
            $result[] = UserSearchDTO::fromModel($user)->toArray();
        }

        return UserSearchResponseDTO::fromArray([
            'page' => $dto->page,
            'users' => $result,
        ]);
    }
}
