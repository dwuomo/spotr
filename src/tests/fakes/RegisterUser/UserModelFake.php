<?php

namespace embryon\tests\fakes\RegisterUser;


use embryon\domain\Exceptions\ResourceCannotPersist;
use embryon\domain\model\UserInterface;

class UserModelFake implements UserInterface
{
    /** @var  integer */
    private $saveTimesCalled;
    /** @var  boolean */
    private $saveResponse = true;
    /** @var  integer */
    private $validateTimesCalled;
    /** @var  boolean */
    private $validateReturn = true;
    /** @var  string */
    private $errorMessageReturn;
    /** @var  boolean */
    private $errorMessageTimesCalled;

    /**
     * @return boolean
     * @throws ResourceCannotPersist
     */
    public function save()
    {
        $this->saveTimesCalled++;

        return $this->saveResponse;
    }

    /**
     * @param boolean $value
     */
    public function saveShouldReturn($value)
    {
        $this->saveResponse = $value;

    }

    /**
     * @return int
     */
    public function getTimesSaveCalled()
    {
        return $this->saveTimesCalled;
    }

    /**
     * @return boolean
     */
    public function validate()
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