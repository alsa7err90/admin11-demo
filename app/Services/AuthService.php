<?php

// app/Services/AuthService.php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function register(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function login(array $credentials): ?User
    {
        if (auth()->attempt($credentials)) {
            return auth()->user();
        }

        return null;
    }
}
