<?php

namespace App\Services;

use App\Contracts\LoginContract;
use App\Contracts\TokenContract;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginService implements LoginContract
{
    public function __construct(public TokenContract $tokenContract){}
    /**
     * login
     *
     *
     * @param  array{mobile: string, password: string}  $data
     * @return array{type: string, message: string, token: string}
     *
     * @throws \Exception
     */
    public function login(array $data)
    {
        $user = User::where('mobile', $data['mobile'])->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            throw new \Exception('نام کاربری یا رمز عبور اشتباه است!');
        }

        $token = $this->tokenContract->for($user)->create('login');

        return [
            'type' => 'success',
            'message' => 'توکن با موفقیت ایجاد شد',
            'token' => $token,
        ];
    }
}
