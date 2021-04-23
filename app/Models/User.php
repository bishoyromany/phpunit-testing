<?php

namespace App\Models;

class User
{
    /**
     * @var string
     */
    protected $firstname = "";
    /**
     * @var string
     */
    protected $lastname = "";
    /**
     * @var string
     */
    protected $email = "";

    public function setFirstName(String $v): Bool
    {
        $this->firstname = trim($v);

        return true;
    }

    public function getFirstName(): String
    {
        return $this->firstname;
    }


    public function setLastName(String $v): Bool
    {
        $this->lastname = trim($v);

        return true;
    }

    public function getLastName(): String
    {
        return $this->lastname;
    }

    public function getFullName(): String
    {
        return $this->firstname . " " . $this->lastname;
    }

    public function setEmail(String $v): Bool
    {
        $this->email = trim($v);

        return true;
    }

    public function getEmail(): String
    {
        return $this->email;
    }

    public function getUser(): array
    {
        return [
            'full_name' => $this->getFullName(),
            'email' => $this->getEmail(),
        ];
    }
}
