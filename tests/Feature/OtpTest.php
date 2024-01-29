<?php

namespace Tests\Feature;

use App\Contracts\OtpContract;
use App\Services\OtpService;
use Tests\TestCase;

class OtpTest extends TestCase
{
    public function test_otp_is_bound_to_otp_contract()
    {
        $otp = app(OtpContract::class);
        $this->assertInstanceOf(OtpService::class, $otp);
    }
}
