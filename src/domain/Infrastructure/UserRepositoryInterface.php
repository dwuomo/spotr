<?php

namespace embryon\domain\Infrastructure;

use embryon\domain\model\__UserIdentityInterface;

interface UserRepositoryInterface
{

    /**
     * @param $userId
     * @return __UserIdentityInterface
     */
    public function ofIdOrFail($userId);

}