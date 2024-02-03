<?php

namespace App\Services;

use App\Contracts\TokenContract;
use App\Models\User;

class TokenService implements TokenContract
{    
    protected User $user;
    /**
     * Method create
     *
     * @param string $name 
     *
     * @return string
     */
    public function create(string $name) :string
    {
        $token = $this->user->createToken($name)->plainTextToken;
        return $token;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function for(User $user) :self
    {
        $this->user = $user;
        return $this;
    }
}
