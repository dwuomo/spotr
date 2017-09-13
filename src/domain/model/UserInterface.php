<?php

namespace embryon\domain\model;


use embryon\domain\Exceptions\ResourceCannotPersist;

interface UserInterface
{

    /**
     * @return boolean
     * @throws ResourceCannotPersist
     */
    public function save();

    /**
     * @return boolean
     */
    public function validate();

    /**
     * @return string
     */
    public function getErrorMessage();

}