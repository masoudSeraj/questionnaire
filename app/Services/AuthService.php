<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Contracts\AuthContract;

class AuthService implements AuthContract
{
    /**
     * login
     *
     * @param  Request $request
     * @return object{type: "success"|"error", message: string, token?: string}
     */
    public function login(Request $request)
    {
        return (object)response()->json(['type' => 'success', 'message' => 'ok']);
    }

    /**
     * register
     *
     * @param  Request $request
     * @return void
     */
    public function register(Request $request)
    {

    }

    /**
     * logout
     *
     * @param  Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        return response()->json();
    }


}
