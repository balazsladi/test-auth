<?php

namespace App\AuthDriver\Provider;

use App\AuthDriver\AuthDriver;

interface AuthDriverProviderInterface
{
    public function getDriver(string $driver): AuthDriver;
}
