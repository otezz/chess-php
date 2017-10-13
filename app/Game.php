<?php

namespace App;

/**
 * Class Game
 *
 * @package App
 */
class Game
{
    const WHITE_PLAYER = 'Putih';
    const BLACK_PLAYER = 'Hitam';

    private $activePlayer;
    private $board;

    public function __construct()
    {
        $this->board = new Board;
    }

    /**
     * Start the game
     */
    public function start()
    {
        $this->setActivePlayer(self::WHITE_PLAYER);

        $i = 1;

        while (true) {
            $this->board->printBoard();
            $this->promptMove();

            $i++;

            if ($i % 2 == 0) {
                $this->setActivePlayer(self::BLACK_PLAYER);
            } else {
                $this->setActivePlayer(self::WHITE_PLAYER);
            }
        }
    }

    /**
     * Handle the input from prompt
     *
     * @return array
     */
    private function handleInput()
    {
        $handle = fopen('php://stdin', 'r');
        $input = fgets($handle, 1024);

        if ($this->validateInput($input) === false) {
            echo 'ERROR: Invalid move' . PHP_EOL;
            $this->promptMove();
        }

        $arr = explode(' ', $input);
        $x = strtoupper($arr[0]);
        $y = (int) $arr[1];

        return ['x' => $x, 'y' => $y];
    }

    /**
     * Ask user how they want to move the piece
     *
     */
    private function promptMove()
    {
        echo '[' . $this->activePlayer . '] Masukan koordinat pertama: ';
        $cord1 = $this->handleInput();

        echo '[' . $this->activePlayer . '] Masukan koordinat kedua: ';
        $cord2 = $this->handleInput();

        if (!$this->validateMove($cord1, $cord2)) {
            echo 'ERROR: Invalid move' . PHP_EOL;
            $this->promptMove();
        } else {
            $this->board->movePiece($cord1, $cord2);
        }
    }

    /**
     * Validate user input
     */
    private function validateInput($input)
    {
        if (strlen($input) < 3) {
            return false;
        }

        if (strpos($input, ' ') === false) {
            return false;
        }

        return true;
    }

    /**
     * Validate move
     *
     * @param $cord1
     * @param $cord2
     * @return bool
     */
    private function validateMove($cord1, $cord2)
    {
        if ($cord1 === $cord2) {
            return false;
        }

        $piece = $this->board->getOccupant($cord1['x'], $cord1['y']);

        if (!$piece) {
            return false;
        }

        if ($piece->owner != $this->activePlayer) {
            return false;
        }

        if (!$piece->validateMove($cord1, $cord2)) {
            return false;
        }

        return true;
    }

    /**
     * @return mixed
     */
    public function getActivePlayer()
    {
        return $this->activePlayer;
    }

    /**
     * @param mixed $activePlayer
     */
    public function setActivePlayer($activePlayer)
    {
        $this->activePlayer = $activePlayer;
    }
}
