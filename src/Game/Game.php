<?php

namespace Edni\Game;

/**
 * A dicehand, consisting of dices.
 */
class Game
{
    /**
     * @var Dice $dices   Array consisting of dices.
     * @var int  $values  Array consisting of last roll of the dices.
     */

    public $player1;
    public $player2;
    private $player1Dices;
    private $player2Dices;
    private $disables;

    /**
     * Constructor to initiate the dicehand with a number of dices.
     *
     * @param int $dices Number of dices to create, defaults to five.
     */
    public function __construct($player1 = 0, $player2 = 0)
    {
        $this->$player1        = $player1;
        $this->$player2        = $player2;
        $this->player1Dices    = [];
        $this->player2Dices    = [];
        $this->disables        = ["", ""];
    }


    /**
     * Roll all dices save their value.
     *
     * @return void.
     */
    public function roll1()
    {
        for ($i=0; $i < 6; $i++) {
            $this->player1Dices[] = rand(1, 6);
        }
    }

    /**
     * Roll all dices save their value.
     *
     * @return void.
     */
    public function roll2()
    {
        for ($i=0; $i < 6; $i++) {
            $this->player2Dices[] = rand(1, 6);
        }
    }

    /**
     * Roll all dices save their value.
     *
     * @return void.
     */
    public function getDices($index)
    {
        $results = [$this->player1Dices, $this->player2Dices];
        return $results[$index];
    }


    /**
     * Get the sum of all dices.
     *
     * @return int as the sum of all dices.
     */
    public function getResults($index)
    {
        $results = [array_sum($this->player1Dices), array_sum($this->player2Dices)];
        return $results[$index];
    }


    /**
     * Get the sum of all dices.
     *
     * @return int as the sum of all dices.
     */
    public function disable($index)
    {
        $this->disables[$index] = "disabled";
    }

    /**
     * Get the sum of all dices.
     *
     * @return int as the sum of all dices.
     */
    public function getDisabled($index)
    {
        return $this->disables[$index];
    }
}
