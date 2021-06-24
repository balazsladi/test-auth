<?php

namespace App\AuthDriver\Factory;

use App\AuthDriver\Entity\DriverUser;
use Illuminate\Support\Str;

class DriverUserFactory implements DriverUserFactoryInterface
{
    public function create(): DriverUser
    {
        return new DriverUser();
    }
}
