<?php

namespace App\Pieces;

/**
 * Class Queen
 *
 * @package App\Pieces
 */
class Queen extends Piece
{
    public $name = 'Qu';

    public function __construct($owner)
    {
        parent::__construct($owner);
    }

    public function validateMove($cord1, $cord2)
    {
        return true;
    }
}
