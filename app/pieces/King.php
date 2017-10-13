<?php

namespace App\Pieces;

/**
 * Class King
 *
 * @package App\Pieces
 */
class King extends Piece
{
    public $name = 'Ki';

    public function __construct($owner)
    {
        parent::__construct($owner);
    }

    public function validateMove($cord1, $cord2)
    {
    }
}
