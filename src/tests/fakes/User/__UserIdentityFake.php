<?php

namespace embryon\tests\fakes\User;


use embryon\domain\model\__UserIdentityInterface;
use embryon\domain\model\User;

class __UserIdentityFake extends User implements __UserIdentityInterface
{

    /** @var  integer */
    private $loginTimesCalled;
    /** @var  boolean */
    private $loginResponse;

    public function __construct()
    {
        $this->loginResponse = true;
    }

    public function login()
    {
        $this->loginTimesCalled++;

        return $this->loginResponse;
    }

    public function loginTimesCalled()
    {
        return $this->loginTimesCalled;
    }

    public function loginShouldResponse($response)
    {
        $this->loginResponse = $response;
    }
}