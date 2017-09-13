<?php

namespace embryon\tests\fakes\LoginUser;

use embryon\application\dtos\LoginUserRequest;
use embryon\application\transformers\LoginUserTransformerInterface;
use embryon\domain\model\User;


/**
 * Class LoginUserTransformerFake
 * @package embryon\tests\application\UseCases
 */
class LoginUserTransformerFake implements LoginUserTransformerInterface
{
    /** @var  integer */
    private $fromRequestToDomainTimesCalled;

    /**
     * LoginUserTransformerFake constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param LoginUserRequest $request
     * @return User
     */
    public function fromRequestToDomain(LoginUserRequest $request)
    {
        $this->fromRequestToDomainTimesCalled++;

        new User();
    }

    public function getFromRequestToDomainTimesCalled()
    {
        return $this->fromRequestToDomainTimesCalled;
    }
}