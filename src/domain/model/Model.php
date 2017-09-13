<?php

namespace embryon\domain\model;


use yii\db\Exception;

abstract class Model
{
    /** @var  array */
    protected $errors = [];

    public function hasErrors()
    {
        if (!empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function getErrors()
    {
        return $this->errors;
    }

}