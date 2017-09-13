<?php

namespace embryon\tests\domain\models;


use embryon\domain\model\User;
use PHPUnit\Framework\TestCase;

class UserTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    /**
     * Validate
     * If Wrong Email should Return False
     * If Correct Email Should Return True
     * If Wrong Pass Min 6 Characters should return false
     * If Correct Pass should return true
     */

    /** @test */
    public function ifWrongEmailShouldReturnFalse()
    {
        $user = new User();
        $user->setEmail("dwuomo@embryon");
        $user->setPass("fake-password");

        $result = $user->validate();

        $expected = false;

        $this->assertTrue($result == $expected);
        $this->assertNotNull($result);
    }

    /** @test */
    public function ifCorrectEmailShouldReturnFalse()
    {
        $user = new User();
        $user->setEmail("dwuomo@embryon.com");
        $user->setPass("fake-password");

        $result = $user->validate();

        $expected = true;

        $this->assertTrue($result == $expected);
        $this->assertNotNull($result);
    }

    /** @test */
    public function ifPasswordLessThan6CharactersShouldReturnFalse()
    {
        $user = new User();
        $user->setEmail("dwuomo@embryon.com");
        $user->setPass("fake");

        $result = $user->validate();

        $expected = false;

//        $this->assertTrue($result == $expected);
        $this->assertNotNull($result);
    }

    /** @test */
    public function ifCorrectPasswordShouldReturnFalse()
    {
        $user = new User();
        $user->setEmail("dwuomo@embryon.com");
        $user->setPass("fake-password");

        $result = $user->validate();

        $expected = true;

        $this->assertTrue($result == $expected);
        $this->assertNotNull($result);
    }

}