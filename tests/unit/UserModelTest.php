<?php

use App\Models\User;

class UserModelTest extends PHPUnit\Framework\TestCase
{
    protected $firstname = "Billy";
    protected $lastname = "Elish";
    protected $email = "admin@gmail.com";

    public function testSetFirstName()
    {
        $user = new User;

        $this->assertTrue($user->setFirstName($this->firstname));
    }

    public function testGetFirstName()
    {
        $user = new User;

        $user->setFirstName($this->firstname);

        $this->assertEquals($user->getFirstName(), $this->firstname);
    }


    public function testSetLastName()
    {
        $user = new User;

        $this->assertTrue($user->setLastName($this->lastname));
    }


    public function testGetLastName()
    {
        $user = new User;

        $user->setLastName($this->lastname);

        $this->assertEquals($user->getLastName(), $this->lastname);
    }

    public function testGetFullName()
    {
        $user = new User;

        $user->setFirstName($this->firstname);
        $user->setLastName($this->lastname);

        $this->assertEquals($user->getFullName(), $this->firstname . " " . $this->lastname);
    }

    public function testFullNameTrimmed()
    {
        $user = new User;

        $user->setFirstName("  $this->firstname  ");
        $user->setLastName("  $this->lastname  ");

        $this->assertEquals($user->getFirstName(), $this->firstname);
        $this->assertEquals($user->getLastName(), $this->lastname);
    }

    public function testSetEmailAddress()
    {
        $user = new User;

        $this->assertTrue($user->setEmail($this->email));
    }

    public function testGetEmailAddress()
    {
        $user = new User;

        $user->setEmail($this->email);

        $this->assertEquals($user->getEmail(), $this->email);
    }

    public function testUserObjectContainsCorrectData()
    {
        $user = new User;

        $user->setFirstName($this->firstname);
        $user->setLastName($this->lastname);
        $user->setEmail($this->email);

        $emailVariables = $user->getUser();

        $this->assertArrayHasKey("full_name", $emailVariables);
        $this->assertArrayHasKey("email", $emailVariables);

        $this->assertEquals($emailVariables['full_name'], $this->firstname . " " . $this->lastname);
        $this->assertEquals($emailVariables['email'], $this->email);
    }
}
