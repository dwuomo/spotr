<?php

namespace embryon\domain\model;


use embryon\domain\Exceptions\ResourceCannotPersist;
use Faker\Provider\DateTime;

/**
 * Class User
 * @package embryon\domain\model
 */
class User extends Model implements UserInterface
{
    const MAX_PASSWORD_LENGTH = 6;

    /** @var  string */
    private $_id;
    /** @var  string */
    private $email;
    /** @var  string */
    private $_pass;
    /** @var  DateTime */
    private $_creationDate;
    /** @var  DateTime */
    private $_modifiedDate;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPass()
    {
        return $this->_pass;
    }

    /**
     * @param string $pass
     */
    public function setPass($pass)
    {
        $this->_pass = $pass;
    }

    /**
     * @return DateTime
     */
    public function getCreationDate()
    {
        return $this->_creationDate;
    }

    /**
     * @return DateTime
     */
    public function getModifiedDate()
    {
        return $this->_modifiedDate;
    }

    /**
     * @return boolean
     * @throws ResourceCannotPersist
     */
    public function save()
    {
        // TODO: Implement save() method.
    }

    /**
     * @return boolean
     */
    public function validate()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {

            $this->errors[] = "[email]: Email not valid";
        }

        if (!strlen($this->_pass) > self::MAX_PASSWORD_LENGTH) {
            $this->errors[] = "[password]: Incorrect Password";
        }

        if ($this->hasErrors()) {
            return false;
        }

        return true;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errors;
    }
}