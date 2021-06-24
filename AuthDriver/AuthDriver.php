<?php

namespace App\AuthDriver;

use App\AuthDriver\Entity\DriverUser;
use App\AuthDriver\Exception\AuthDriverException;
use App\AuthDriver\Factory\DriverUserFactoryInterface;

abstract class AuthDriver implements AuthDriverInterface
{
    /** @var DriverUserFactoryInterface */
    protected $driverUserFactory;

    /**
     * AuthDriver constructor.
     * @param DriverUserFactoryInterface $driverUserFactory
     */
    public function __construct(DriverUserFactoryInterface $driverUserFactory)
    {
        $this->driverUserFactory = $driverUserFactory;
    }

    /**
     * @param string $accessToken
     * @param array|null $options
     * @return DriverUser|null
     * @throws AuthDriverException
     */
    abstract public function getUser(string $accessToken, ?array $options = []): ?DriverUser;
}
