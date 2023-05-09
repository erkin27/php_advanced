<?php

class UserException extends Exception {}

class User
{
    private int $id;
    private string $password;

    public function __construct(int $id, string $password)
    {
        if ($id <= 0) {
            throw new UserException("Id is not valid. Id must be great than 0 and have only numbers");
        }
        if (strlen($password) > 8) {
            throw new UserException("Password is not valid. Password must be contains less or equal than 8 symbols");
        }
        $this->id = $id;
        $this->password = $password;
    }

    public function getUserData(): array
    {
        return ['id' => $this->id, 'password' => $this->password];
    }
}

try {
    $user = new User('13tet', 'test');
    print_r($user->getUserData());
} catch (UserException $userException) {
    echo sprintf(
        'Message: %s. File: %s. Line number: %s',
        $userException->getMessage(),
        $userException->getFile(),
        $userException->getLine(),
    ) . PHP_EOL;
} catch (Throwable $exception) {
    echo sprintf(
            'Message: %s. File: %s. Line number: %s',
            $exception->getMessage(),
            $exception->getFile(),
            $exception->getLine(),
        ) . PHP_EOL;
}
