<?php

namespace App\AuthDriver\Google;

use App\AuthDriver\Entity\DriverUser;
use App\AuthDriver\AuthDriver;
use App\AuthDriver\Exception\AuthDriverException;
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;
use Google_Client as GoogleClient;

class GoogleAuthDriver extends AuthDriver
{
    /**
     * @param string $accessToken
     * @param array|null $options
     * @return DriverUser|null
     * @throws AuthDriverException
     */
    public function getUser(string $accessToken, ?array $options = []): ?DriverUser
    {
        $client = new GoogleClient();

        $payload = $client->verifyIdToken($accessToken);

        Assert::notFalse($payload, 'Felhasználó nem található');

        if (!isset($payload["email"])) {
           throw new AuthDriverException('Kérjük engedélyezd az emailed megosztását!');
        }

        $driverUser = $this->driverUserFactory->create();
        $driverUser->setEmail($payload['email']);
        $driverUser->setName($payload['name'] ?? null);
        $driverUser->setGoogleId($payload['sub'] ?? 'empty_'. Str::random(10));

        return $driverUser;
    }
}
