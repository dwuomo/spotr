<?php

namespace embryon\domain\Validators;


/**
 * Class PasswordValidator
 * @package embryon\domain\Validators
 */
class PasswordValidator
{
    const MAX_PASSWORD_LENGTH = 6;
    /** @var  string */
    private $field;

    /**
     * PasswordValidator constructor.
     * @param $field
     */
    private function __construct($field)
    {
        $this->field = $field;
    }

    /**
     * @param $field
     * @return PasswordValidator
     */
    public static function fromField($field)
    {
        return new self($field);
    }

    /**
     * @return bool
     */
    public function validate()
    {
        if (!$this->isLessThan6()) {
            return false;
        }

        return true;
    }

    private function isLessThan6()
    {
        return strlen($this->field) > self::MAX_PASSWORD_LENGTH;
    }

}