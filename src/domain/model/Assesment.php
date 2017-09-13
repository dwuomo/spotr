<?php

namespace embryon\domain\model;


/**
 * Class Assesment
 * @package embryon\domain\model
 */
class Assesment
{
    /** @var  Comments */
    private $comment;
    /** @var  int */
    private $points;

    /**
     * @return Comments
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param Comments $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return int
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param int $points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }

}