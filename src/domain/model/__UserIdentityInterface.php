<?php

namespace embryon\domain\model;


/**
 * Interface __UserIdentityInterface
 * @package embryon\domain\model
 */
interface __UserIdentityInterface extends UserInterface
{

    /**
     * @return boolean
     */
    public function login();

}