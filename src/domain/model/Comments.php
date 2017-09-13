<?php

namespace embryon\domain\model;

/**
 * Class Comments
 * @package embryon\domain\model
 */
class Comments
{

    /** @var  string */
    private $_message;

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->_message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->_message = $message;
    }

}