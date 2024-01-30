<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface AuthContract
{
    /**
     * login
     *
     * @param  Request $request
     * @return \Illuminate\Http\JsonResponse object{"type": "success"|"error", "message": string, "token"?: string}
     */
    public function login(Request $request);
    /**
     * register
     *
     * @param  Request $request
     * @return mixed
     */
    public function register(Request $request);
    public function logout(Request $request);
}
