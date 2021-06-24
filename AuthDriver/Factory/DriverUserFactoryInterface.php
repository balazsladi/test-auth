<?php

namespace App\AuthDriver\Factory;

use App\AuthDriver\Entity\DriverUser;

interface DriverUserFactoryInterface
{
    public function create(): DriverUser;
}
