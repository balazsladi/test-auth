<?php

namespace App\AuthDriver\Provider;

use App\AuthDriver\AuthDriver;
use Webmozart\Assert\Assert;

class AuthDriverProvider implements AuthDriverProviderInterface
{
    public function getDriver(string $driver): AuthDriver
    {
        $driverClass = config("auth.social.drivers.$driver");

        $driver = resolve($driverClass);

        Assert::isInstanceOf($driver, AuthDriver::class);

        return $driver;
    }
}
