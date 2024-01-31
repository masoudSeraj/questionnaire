<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface AuthContract
{
    /**
     * login
     *
     * @return object{"type": "success"|"error", "message": string, "token"?: string}
     */
    public function login(Request $request);

    /**
     * register
     *
     * @return mixed
     */
    public function register(Request $request);

    /**
     * logout
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request);
}
