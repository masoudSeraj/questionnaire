<?php

namespace App\Services;

use App\Contracts\AuthContract;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthContract
{
    /**
     * register
     *
     * @param  array<string, string>  $data
     * @return array{type: string, message: string, token: string}
     */
    public function register(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
        ]);

        $token = $user->createToken('register token')->plainTextToken;

        return ['type' => 'success', 'message' => 'ثبت نام با موفقیت انجام شد.', 'token' => $token];
    }

    /**
     * logout
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        return response()->json();
    }
}
