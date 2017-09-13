<?php

namespace embryon\tests\fakes\RegisterUser;


use embryon\application\dtos\RegisterUser\RegisterUserResponse;
use embryon\application\dtos\RegisterUserRequest;
use embryon\application\transformers\RegisterUserTransformerInterface;
use embryon\domain\model\User;
use embryon\domain\model\UserInterface;

class RegisterUserTransformerFake implements RegisterUserTransformerInterface
{
    /** @var integer */
    private $timesCalled = 0;
    /** @var  User */
    private $fromRequestToDomainResponse;
    /** @var  integer */
    private $fromDomainToResponseTimesCalled;
    /** @var  RegisterUserResponse */
    private $fromDomainToResponseResponse;


    public function __construct()
    {
        $this->fromRequestToDomainResponse = new UserModelFake();
    }

    /**
     * @param RegisterUserRequest $registerUserRequest
     * @return User
     */
    public function fromRequestToDomain(RegisterUserRequest $registerUserRequest)
    {
        $this->timesCalled ++;

        return $this->fromRequestToDomainResponse;
    }

    public function fromRequestToDomainShoulReturn (UserInterface $value)
    {
        $this->fromRequestToDomainResponse = $value;

    }

    public function getTimesCalled()
    {
        return $this->timesCalled;
    }


    /**
     * @param UserInterface $user
     * @return RegisterUserResponse
     */
    public function fromDomainToResponse(UserInterface $user)
    {
        $this->fromDomainToResponseTimesCalled++;

        return $this->fromDomainToResponseResponse;
    }

    /**
     * @return int
     */
    public function getFromDomainToResponseTimesCalled()
    {
        return $this->fromDomainToResponseTimesCalled;
    }

    /**
     * @param $value
     */
    public function fromDomainToResponseShouldResponse(RegisterUserResponse $value)
    {
        $this->fromDomainToResponseResponse = $value;

    }


}