<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface AuthContract
{
    /**
     * register
     *
     * @param  array<string, string>  $data
     * @return array<string, string>
     */
    public function register(array $data);

    /**
     * logout
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request);
}
