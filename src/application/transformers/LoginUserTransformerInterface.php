<?php

namespace embryon\application\transformers;

use embryon\application\dtos\LoginUserRequest;
use embryon\domain\model\User;

interface LoginUserTransformerInterface
{

    /**
     * @param LoginUserRequest $request
     * @return User
     */
    public function fromRequestToDomain(LoginUserRequest $request);

}