<?php

namespace embryon\tests\fakes\RegisterUser;


use embryon\application\validators\RegisterUserValidatorInterface;
use embryon\domain\model\User;
use embryon\domain\model\UserInterface;

class RegisterUserValidatorFake implements RegisterUserValidatorInterface
{
    /** @var  integer */
    private $validateTimesCalled;
    /** @var  boolean */
    private $validateReturn = true;
    /** @var  string */
    private $errorMessageReturn;
    /** @var  boolean */
    private $errorMessageTimesCalled;

    /**
     * RegisterUserValidatorFake constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param UserInterface $user
     * @return bool
     */
    public function validate(UserInterface $user)
    {
        $this->validateTimesCalled ++;

        return $this->validateReturn;
    }

    /**
     * @return int
     */
    public function getValidateTimesCalled()
    {
        return $this->validateTimesCalled;
    }

    /**
     * @param $value
     */
    public function validateShouldReturn($value)
    {
        $this->validateReturn = $value;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        $this->errorMessageTimesCalled++;

        return $this->errorMessageReturn;
    }

    public function errorMessageShouldReturn($message)
    {
        $this->errorMessageReturn = $message;
    }

    public function getErrorMessageTimesCalled()
    {
        return $this->errorMessageTimesCalled;
    }
}