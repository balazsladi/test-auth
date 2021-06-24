<?php

namespace App\AuthDriver;

use App\AuthDriver\Entity\DriverUser;

interface AuthDriverInterface
{
    public function getUser(string $accessToken, ?array $options = []): ?DriverUser;
}
