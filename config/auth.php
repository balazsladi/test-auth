<?php

return [
    //...

    'social' => [
        'drivers' => [
            'google' => \App\AuthDriver\Google\GoogleAuthDriver::class,
            'facebook' => \App\AuthDriver\Facebook\FacebookAuthDriver::class,
            'apple' => \App\AuthDriver\Apple\AppleAuthDriver::class
        ]
    ]

];
