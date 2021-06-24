<?php

namespace App\AuthDriver\Entity;

class DriverUser
{
    /** @var string */
    private $email;

    /** @var string */
    private $name;

    /** @var string|null */
    private $facebookId;

    /** @var string|null */
    private $googleId;

    /** @var string|null */
    private $appleId;

    /** @var string */
    private $birthday;

    /** @var string */
    private $gender;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getFacebookId(): ?string
    {
        return $this->facebookId;
    }

    /**
     * @return bool
     */
    public function hasFacebookId(): bool
    {
        return isset($this->facebookId);
    }

    /**
     * @param string|null $facebookId
     */
    public function setFacebookId(?string $facebookId): void
    {
        $this->facebookId = $facebookId;
    }

    /**
     * @return string|null
     */
    public function getGoogleId(): ?string
    {
        return $this->googleId;
    }

    /**
     * @return bool
     */
    public function hasGoogleId(): bool
    {
        return isset($this->googleId);
    }

    /**
     * @param string|null $googleId
     */
    public function setGoogleId(?string $googleId): void
    {
        $this->googleId = $googleId;
    }

    /**
     * @return string|null
     */
    public function getAppleId(): ?string
    {
        return $this->appleId;
    }

    /**
     * @return bool
     */
    public function hasAppleId(): bool
    {
        return isset($this->appleId);
    }

    /**
     * @param string|null $appleId
     */
    public function setAppleId(?string $appleId): void
    {
        $this->appleId = $appleId;
    }

    /**
     * @return string|null
     */
    public function getBirthday(): ?string
    {
        return $this->birthday;
    }

    /**
     * @param string|null $birthday
     */
    public function setBirthday(?string $birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * @return string|null
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * @param string|null $gender
     */
    public function setGender(?string $gender): void
    {
        $this->gender = $gender;
    }
}
