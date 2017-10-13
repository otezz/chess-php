<?php

namespace App\Pieces;

/**
 * Class Pawn
 *
 * @package App\Pieces
 */
class Pawn extends Piece
{
    /**
     * @var string
     */
    public $name = 'Pw';

    /**
     * Pawn constructor.
     *
     * @param $owner
     */
    public function __construct($owner)
    {
        parent::__construct($owner);
    }

    /**
     * @var bool
     */
    private $isFirstMove = true;

    /**
     *
     */
    public function moved()
    {
        $this->isFirstMove = false;
    }

    /**
     * @param $cord1
     * @param $cord2
     * @return bool
     */
    public function validateMove($cord1, $cord2)
    {
        if (abs($cord1['y'] - $cord2['y']) > 2) {
            return false;
        }

        if (!$this->isFirstMove && abs($cord1['y'] - $cord2['y']) > 1) {
            return false;
        }

        if ($cord1['x'] != $cord2['x']) {
            // need check if this move taking another piece
            return false;
        }

        $this->moved();

        return true;
    }
}
