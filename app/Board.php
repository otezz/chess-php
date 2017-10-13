<?php

namespace App;

/**
 * Class Board
 *
 * @package App
 */
use App\Pieces\Bishop;
use App\Pieces\King;
use App\Pieces\Knight;
use App\Pieces\Pawn;
use App\Pieces\Queen;
use App\Pieces\Rook;

/**
 * Class Board
 *
 * @package App
 */
class Board
{
    /**
     * @var
     */
    public $state;

    public function __construct()
    {
        $this->initiateState();
    }

    /**
     * Set the initial state
     */
    private function initiateState()
    {
        $state = [
            '8' => [
                'A' => new Rook(Game::BLACK_PLAYER),
                'B' => new Knight(Game::BLACK_PLAYER),
                'C' => new Bishop(Game::BLACK_PLAYER),
                'D' => new Queen(Game::BLACK_PLAYER),
                'E' => new King(Game::BLACK_PLAYER),
                'F' => new Bishop(Game::BLACK_PLAYER),
                'G' => new Knight(Game::BLACK_PLAYER),
                'H' => new Rook(Game::BLACK_PLAYER),
            ],
            '7' => [
                'A' => new Pawn(Game::BLACK_PLAYER),
                'B' => new Pawn(Game::BLACK_PLAYER),
                'C' => new Pawn(Game::BLACK_PLAYER),
                'D' => new Pawn(Game::BLACK_PLAYER),
                'E' => new Pawn(Game::BLACK_PLAYER),
                'F' => new Pawn(Game::BLACK_PLAYER),
                'G' => new Pawn(Game::BLACK_PLAYER),
                'H' => new Pawn(Game::BLACK_PLAYER),
            ],
            '6' => [
                'A' => null,
                'B' => null,
                'C' => null,
                'D' => null,
                'E' => null,
                'F' => null,
                'G' => null,
                'H' => null,
            ],
            '5' => [
                'A' => null,
                'B' => null,
                'C' => null,
                'D' => null,
                'E' => null,
                'F' => null,
                'G' => null,
                'H' => null,
            ],
            '4' => [
                'A' => null,
                'B' => null,
                'C' => null,
                'D' => null,
                'E' => null,
                'F' => null,
                'G' => null,
                'H' => null,
            ],
            '3' => [
                'A' => null,
                'B' => null,
                'C' => null,
                'D' => null,
                'E' => null,
                'F' => null,
                'G' => null,
                'H' => null,
            ],
            '2' => [
                'A' => new Pawn(Game::WHITE_PLAYER),
                'B' => new Pawn(Game::WHITE_PLAYER),
                'C' => new Pawn(Game::WHITE_PLAYER),
                'D' => new Pawn(Game::WHITE_PLAYER),
                'E' => new Pawn(Game::WHITE_PLAYER),
                'F' => new Pawn(Game::WHITE_PLAYER),
                'G' => new Pawn(Game::WHITE_PLAYER),
                'H' => new Pawn(Game::WHITE_PLAYER),
            ],
            '1' => [
                'A' => new Rook(Game::WHITE_PLAYER),
                'B' => new Knight(Game::WHITE_PLAYER),
                'C' => new Bishop(Game::WHITE_PLAYER),
                'D' => new Queen(Game::WHITE_PLAYER),
                'E' => new King(Game::WHITE_PLAYER),
                'F' => new Bishop(Game::WHITE_PLAYER),
                'G' => new Knight(Game::WHITE_PLAYER),
                'H' => new Rook(Game::WHITE_PLAYER),
            ],
        ];

        $this->setState($state);
    }

    /**
     *
     */
    public function printBoard()
    {
        $i = 8;
        foreach ($this->state as $x => $v) {
            echo $i;
            foreach ($v as $y => $val) {
                $this->printGrid($y, $x);
            }
            echo PHP_EOL;
            $i--;
        }
        echo '   A     B     C     D     E     F     G     H' . PHP_EOL;
    }

    public function movePiece($cord1, $cord2)
    {
        $state = $this->getState();
        $state[$cord2['y']][$cord2['x']] = $state[$cord1['y']][$cord1['x']];
        $state[$cord1['y']][$cord1['x']] = null;
        $this->setState($state);
    }

    private function printGrid($x, $y)
    {
        $occupant = $this->getOccupant($x, $y);

        if ($occupant == null) {
            echo '  --  ';
        } else {
            if ($occupant->owner == Game::WHITE_PLAYER) {
                echo '  ' . $occupant->name . '  ';
            } else {
                echo " \033[32m " . $occupant->name . "  \e[0m";
            }
        }
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    public function getOccupant($x, $y)
    {
        $state = $this->getState();

        return $state[$y][$x];
    }
}
