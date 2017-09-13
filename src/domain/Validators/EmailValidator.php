<?php

namespace embryon\domain\Validators;


/**
 * Class EmailValidator
 * @package embryon\domain\Validators
 */
class EmailValidator
{
    /** @var  string */
    private $field;

    private function __construct($field)
    {
        $this->field = $field;
    }

    public static function fromField($field)
    {
        return new self($field);
    }

    public function validate()
    {
        if (!filter_var($this->field, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

}