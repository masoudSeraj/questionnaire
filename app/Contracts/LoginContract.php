<?php

namespace App\Contracts;

interface LoginContract
{
    /**
     * login
     *
     * @param  array<string, string>  $data
     * @return array<string, string>
     */
    public function login(array $data);
}
