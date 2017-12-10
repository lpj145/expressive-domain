<?php
namespace ApiBase\Support\Password;

class DefaultPassword
{
    const PASSWORD_TYPE = PASSWORD_BCRYPT;

    private $password;

    public function __construct(string $password)
    {
        $this->password = $password;
    }

    public function __toString()
    {
        return password_hash($this->password, self::PASSWORD_TYPE);
    }
}
