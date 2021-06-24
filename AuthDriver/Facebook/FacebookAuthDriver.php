<?php

namespace App\AuthDriver\Facebook;

use App\AuthDriver\Entity\DriverUser;
use App\AuthDriver\AuthDriver;
use App\AuthDriver\Exception\AuthDriverException;
use GuzzleHttp\Exception\GuzzleException;
use Laravel\Socialite\Facades\Socialite;
use Webmozart\Assert\Assert;

class FacebookAuthDriver extends AuthDriver
{
    /**
     * @param string $accessToken
     * @param array|null $options
     * @return DriverUser|null
     * @throws AuthDriverException
     * @throws GuzzleException
     */
    public function getUser(string $accessToken, ?array $options = []): ?DriverUser
    {
        $user = Socialite::driver('facebook')->userFromToken($accessToken);

        Assert::true(isset($user), 'Felhasználó nem található!');

        if ($user->getEmail() === null) {
            throw new AuthDriverException('Kérjük engedélyezd az emailed megosztását!');
        }

        $driverUser = $this->driverUserFactory->create();
        $driverUser->setEmail($user->getEmail());
        $driverUser->setFacebookId($user->getId());
        $driverUser->setName($user->getName());

        return $driverUser;
    }
}
