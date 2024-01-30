<?php

namespace App\Services;

use App\Contracts\OtpContract;
use Exception;
use Ichtrojan\Otp\Otp;
use Throwable;

class OtpService implements OtpContract
{
    protected $length = 6;

    protected const TYPE = [
        'numeric',
        'alpha_numeric',
    ];

    protected $type = 'numeric';

    protected $validity = 2;

    /**
     * Method __construct
     *
     *
     * @return void
     */
    public function __construct(public Otp $otp)
    {
    }

    /**
     * generate otp
     *
     * @return array{status: true, token: string, message: string}
     *
     * @throws Exception
     */
    public function generate(string $identifier): object
    {
        return $this->otp->generate($identifier, $this->type, $this->length, $this->validity);
    }

    /**
     * validate
     *
     * @param  mixed  $identifier
     * @param  mixed  $token
     * @return array{status: boolean, message: string}
     */
    public function validate(string $identifier, string $token): object
    {
        return $this->otp->validate($identifier, $token);
    }

    /**
     * setType for specified otp service
     *
     * @param  value-of<self::TYPE>  $type
     * @return self
     *
     * @throws Exception
     */
    public function setType(string $type): Throwable|self
    {
        if (! in_array($type, self::TYPE)) {
            throw new Exception('مقدار وارد شده معتبر نیست!');
        }

        $this->type = $type;

        return $this;
    }

    /**
     * setLength
     */
    public function setLength(int $length): self
    {
        $this->length = $length;

        return $this;
    }

    /**
     * setValidity
     */
    public function setValidity(int $minutes): self
    {
        $this->validity = $minutes;

        return $this;
    }
}
