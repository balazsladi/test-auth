<?php

namespace App\Http\Controllers\Api;

use App\AuthDriver\Exception\AuthDriverException;
use App\AuthDriver\Provider\AuthDriverProviderInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\SocialRequest;
use Illuminate\Http\JsonResponse;

class AuthenticationController extends Controller
{
    /** @var string */
    private const TOKEN_NAME = 'Personal Access Client';

    /** @var AuthDriverProviderInterface */
    private $authDriverProvider;

    public function __construct(
        AuthDriverProviderInterface $authDriverProvider
    )
    {
        parent::__construct($response);

        $this->authDriverProvider = $authDriverProvider;
    }

    public function socialLogin(SocialRequest $request, string $driver): JsonResponse
    {
        $driver = $this->authDriverProvider->getDriver($driver);

        try {
            $driverUser = $driver->getUser($request->get('accessToken'), $request->get('options'));
        }
        catch (AuthDriverException $exception) {
            return $this->response->error($exception->getMessage());
        }

        $user = $this->userRepository->findByEmail($driverUser->getEmail());

        if (!isset($user)) {
            $user = $this->userFactory->createFromDriverUser($driverUser);
        }

        $user->setVerified(true);
        $user->setLoggedIn(true);

        $user->save();

        $token = $user->createToken(self::TOKEN_NAME)->accessToken;

        return $this->response->success(['token' => $token]);
    }
}