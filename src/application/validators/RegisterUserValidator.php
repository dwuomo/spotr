<?php

namespace embryon\application\validators;


use embryon\application\Exceptions\BadRequestException;
use embryon\domain\model\User;

class RegisterUserValidator implements RegisterUserValidatorInterface
{

    /**
     * @param User $user
     * @return boolean
     *
     * @throws BadRequestException
     */
    public function validate(User $user)
    {
        // TODO: Implement validate() method.
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        // TODO: Implement getErrorMessage() method.
    }
}