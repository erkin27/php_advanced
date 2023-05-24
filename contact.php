<?php

require_once 'vendor/autoload.php';

class Contact
{
    private string $name;
    private string $surname;
    private string $email;
    private string $phone;
    private string $address;

    private stdClass $temp;

    public function __construct()
    {
        $this->reset();
    }

    private function reset(): void
    {
        $this->temp = new stdClass();
    }

    public function name(string $name): self
    {
        $this->temp->name = $name;
        return $this;
    }

    public function surname(string $surname): self
    {
        $this->temp->surname = $surname;
        return $this;
    }

    public function email(string $email): self
    {
        $this->temp->email = $email;
        return $this;
    }

    public function phone(string $phone): self
    {
        $this->temp->phone = $phone;
        return $this;
    }

    public function address(string $address): self
    {
        $this->temp->address = $address;
        return $this;
    }

    public function build(): self
    {
        $contact = new self();
        foreach ($this->temp as $name => $value) {
            $contact->$name = $value;
        }
        $this->reset();
        return $contact;
    }
}

$contact = new Contact();
$newContact = $contact->phone('000-555-000')
    ->name("John")
    ->surname("Surname")
    ->email("john@email.com")
    ->address("Some address")
    ->build();

dd($newContact);

