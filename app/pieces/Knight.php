<?php

namespace App\Pieces;

/**
 * Class Knight
 *
 * @package App\Pieces
 */
class Knight extends Piece
{
    public $name = 'Kn';

    public function __construct($owner)
    {
        parent::__construct($owner);
    }

    public function validateMove($cord1, $cord2)
    {
    }
}
