<?php

class UserException extends Exception
{
}

class User
{
    private string $name;
    private int $age;
    private string $email;

    private function setName(string $name): void
    {
        $this->name = $name;
    }

    private function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function getAll(): array
    {
        return [
            'name' => $this->name ?? null,
            'age' => $this->age ?? null,
            'email' => $this->email ?? null,
        ];
    }

    public function __toString(): string
    {
        $message = 'User Data: ';
        foreach ($this->getAll() as $property => $value) {
            $message .= "$property - $value; ";
        }
        return $message;
    }

    /**
     * @throws UserException
     */
    public function __call($name, $arguments)
    {
        if (!method_exists($this, $name)) {
            throw new UserException("Method '$name' is not found.");
        }
        return $this->$name($arguments[0]);
    }
}

class UserFactory
{
    public static function create(array $data): User
    {
        $obj = new User();
        foreach ($data as $property => $value) {
            try {
                $setter = 'set' . $property;
                $obj->$setter($value);
            } catch (UserException $userException) {
                print $userException->getMessage() . PHP_EOL;
            }
        }
        return $obj;
    }
}

$userData = [
    'name' => 'John Wick',
    'email' => 'wick@gmail.com',
    'age' => 46,
];

$user = UserFactory::create($userData);
print $user . PHP_EOL;



