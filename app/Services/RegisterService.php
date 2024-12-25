<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function register(array $data) : User
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        return $user;
    }
}
