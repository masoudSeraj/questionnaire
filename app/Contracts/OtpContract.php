<?php

namespace App\Contracts;

use Throwable;

interface OtpContract
{
    /**
     * generate otp
     *
     * @return array{status: true, token: string, message: string}
     *
     * @throws \Exception
     */
    public function generate(string $identifier): object;

    /**
     * validate
     *
     * @param  mixed  $identifier
     * @param  mixed  $token
     * @return array{status: boolean, message: string}
     */
    public function validate(string $identifier, string $token);

    /**
     * setType for specified otp service
     *
     * @param  value-of<self::TYPE>  $type
     * @return self
     *
     * @throws \Exception
     */
    public function setType(string $type): self|Throwable;

    /**
     * Method setLength
     *
     * @param int $length 
     *
     * @return self
     */
    public function setLength(int $length): self;
    
    /**
     * Method setValidity
     *
     * @param int $time 
     *
     * @return self
     */
    public function setValidity(int $time): self;
}
