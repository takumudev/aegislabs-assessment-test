<?php

namespace App\Http\Controllers;

use App\DTOs\UserCreateRequestDTO;
use App\DTOs\UserSearchRequestDTO;
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
        return $this->userService->searchUser(UserSearchRequestDTO::fromRequest($request));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->userService->createUser(UserCreateRequestDTO::fromRequest($request));
    }
}
