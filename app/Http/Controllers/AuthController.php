<?php

namespace App\Http\Controllers;

use App\Actions\User\ListUsers;
use App\Actions\User\LoginUser;
use App\Actions\User\RegisterUser;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $registerUser;
    protected $loginUser;
    protected $listUsers;

    public function __construct(
        RegisterUser $registerUser,
        LoginUser $loginUser,
        ListUsers $listUsers
    )
    {
        $this->registerUser = $registerUser;
        $this->loginUser = $loginUser;
        $this->listUsers = $listUsers;
    }

    public function register(Request $request)
    {
        return $this->registerUser->execute($request);
    }

    public function login(Request $request)
    {
        return $this->loginUser->execute($request);
    }

    public function index()
    {
        return $this->listUsers->execute();
    }
}
