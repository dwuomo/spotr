<?php

namespace embryon\application\validators;


use embryon\domain\model\UserInterface;

interface RegisterUserValidatorInterface
{

    /**
     * @param UserInterface $user
     * @return bool
     */
    public function validate(UserInterface $user);

    /**
     * @return string
     */
    public function getErrorMessage();

}