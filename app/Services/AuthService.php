<?php

namespace App\Services;

use App\Models\UsersModel;

class AuthService
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new \App\Models\UsersModel();
    }

    public function login($username, $password)
    {
        $user = $this->usersModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }
}
