<?php

namespace embryon\tests\fakes\User;
use embryon\domain\Infrastructure\UserRepositoryInterface;
use embryon\domain\model\__UserIdentityInterface;

/**
 * Class UserRepositoryFake
 */
class UserRepositoryFake implements UserRepositoryInterface
{

    /** @var  integer */
    private $ofIdOrFailTimes;
    /** @var  string */
    private $ofIdOrFailHasReceived;
    /** @var  __UserIdentityInterface */
    private $ofIdOrFailResponse;

    public function __construct()
    {
        $this->ofIdOrFailResponse = new __UserIdentityFake();
    }


    public function ofIdOrFail($userId) {
        $this->ofIdOrFailHasReceived = $userId;
        $this->ofIdOrFailTimes++;

        return $this->ofIdOrFailResponse;
    }

    public function getofIdOrFailTimesCalled()
    {
        return $this->ofIdOrFailTimes;
    }

    public function getOfIdOrFailHasReceived()
    {
        return $this->ofIdOrFailHasReceived;
    }

    public function ofIdOrFailShouldResponse(__UserIdentityInterface $response)
    {
        $this->ofIdOrFailResponse = $response;
    }

}