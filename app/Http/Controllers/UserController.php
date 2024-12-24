<?php

namespace App\Http\Controllers;

use App\DTOs\UserCreateRequestDTO;
use App\DTOs\UserSearchRequestDTO;
use App\Services\UserService\CreateUserCommand;
use App\Services\UserService\SearchUserCommand;
use App\Services\UserService\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private readonly UserServiceInterface $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cmd = new SearchUserCommand(UserSearchRequestDTO::fromRequest($request), 10);
        return $this->userService->searchUser($cmd);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cmd = new CreateUserCommand(UserCreateRequestDTO::fromRequest($request));
        return $this->userService->createUser($cmd);
    }
}
