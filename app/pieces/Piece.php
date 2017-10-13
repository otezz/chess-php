<?php

namespace App\Pieces;

/**
 * Class Piece
 *
 * @package App
 */
abstract class Piece
{
    /**
     * @var
     */
    public $owner;

    /**
     * @var
     */
    public $location;

    /**
     * @var string
     */
    public $name;

    /**
     * Piece constructor.
     *
     * @param $owner
     */
    public function __construct($owner)
    {
        $this->setOwner($owner);
    }

    /**
     * @param $cord1
     * @param $cord2
     * @return mixed
     */
    abstract function validateMove($cord1, $cord2);

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param mixed $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }
}
