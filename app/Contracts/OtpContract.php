<?php

namespace App\Contracts;

use Throwable;

interface OtpContract
{
    protected const TYPE = [
        'numeric',
        'alpha_numeric',
    ];

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

    public function setLength(int $length): self;

    public function setValidity(int $time): self;
}
