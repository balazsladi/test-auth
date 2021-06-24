<?php

namespace App\AuthDriver\Apple;

use App\AuthDriver\AuthDriver;
use App\AuthDriver\Entity\DriverUser;
use AppleSignIn\ASDecoder;

class AppleAuthDriver extends AuthDriver
{
    public function getUser(string $accessToken, ?array $options = []): ?DriverUser
    {
        $appleSignInPayload = ASDecoder::getAppleSignInPayload($accessToken);

        $driverUser = $this->driverUserFactory->create();

        $driverUser->setEmail($appleSignInPayload->getEmail());
        $driverUser->setName($options['username'] ?? null);
        $driverUser->setAppleId(sha1($driverUser->getEmail()));

        return $driverUser;
    }
}
