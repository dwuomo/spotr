<?php

namespace embryon\application\transformers;


use embryon\application\dtos\RegisterUser\RegisterUserResponse;
use embryon\application\dtos\RegisterUserRequest;
use embryon\domain\model\User;
use embryon\domain\model\UserInterface;

interface RegisterUserTransformerInterface
{
    /**
     * @param RegisterUserRequest $registerUserRequest
     * @return User
     */
    public function fromRequestToDomain(RegisterUserRequest $registerUserRequest);

    /**
     * @param UserInterface $user
     * @return RegisterUserResponse
     */
    public function fromDomainToResponse(UserInterface $user);

}