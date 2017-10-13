<?php

namespace App\Pieces;

/**
 * Class Bishop
 *
 * @package App\Pieces
 */
class Bishop extends Piece
{
    public $name = 'Bs';

    public function __construct($owner)
    {
        parent::__construct($owner);
    }

    public function validateMove($cord1, $cord2)
    {
    }
}
