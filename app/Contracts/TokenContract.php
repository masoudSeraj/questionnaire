<?php

namespace App\Contracts;

use App\Models\User;

interface TokenContract
{    
    /**
     * Method create
     *
     * @param string $tokenName [explicite description]
     *
     * @return string
     */
    public function create(string $tokenName) :string;
    
    /**
     * Method setUser
     *
     * @param User $user
     *
     * @return self
     */
    public function for(User $user) :self;
}
