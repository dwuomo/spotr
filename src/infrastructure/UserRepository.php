<?php

use embryon\domain\Infrastructure\UserRepositoryInterface;


/**
 * Class UserRepository
 */
class UserRepository implements UserRepositoryInterface
{

    /**
     * @param $userId
     * @return \embryon\domain\model\__UserIdentity
     */
    public function ofIdOrFail($userId)
    {
        // TODO: Implement ofIdOrFail() method.
    }
}