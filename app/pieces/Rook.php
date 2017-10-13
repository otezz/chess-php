<?php

namespace App\Pieces;

/**
 * Class Rook
 *
 * @package App\Pieces
 */
class Rook extends Piece
{
    public $name = 'Rk';

    public function __construct($owner)
    {
        parent::__construct($owner);
    }

    public function validateMove($cord1, $cord2)
    {
        return true;
    }

    public function validMoves($cord1)
    {

    }
}
