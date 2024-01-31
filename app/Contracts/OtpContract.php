<?php

namespace App\Contracts;

use Throwable;

interface OtpContract
{
    /**
     * generate otp
     *
     * @return object
     *
     * @throws \Exception
     */
    public function generate(string $identifier);

    /**
     * validate
     *
     * @param  string  $identifier
     * @param  string  $token
     * @return object
     */
    public function validate(string $identifier, string $token);

    /**
     * setType for specified otp service
     *
     * @param  string  $type
     * @return self
     *
     * @throws \Exception
     */
    public function setType(string $type): self|Throwable;

    /**
     * Method setLength
     */
    public function setLength(int $length): self;

    /**
     * Method setValidity
     */
    public function setValidity(int $time): self;
}
