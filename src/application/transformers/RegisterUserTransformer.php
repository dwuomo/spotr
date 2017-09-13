<?php

namespace embryon\application\transformers;


use embryon\application\dtos\RegisterUserRequest;
use embryon\domain\model\User;

class RegisterUserTransformer implements RegisterUserTransformerInterface
{

    /**
     * @param RegisterUserRequest $registerUserRequest
     * @return User
     */
    public function fromRequestToDomain(RegisterUserRequest $registerUserRequest)
    {
        // TODO: Implement fromRequestToDomain() method.
    }

}