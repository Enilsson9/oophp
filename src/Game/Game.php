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
    private $player1DicesFake;
    private $player2DicesFake;
    private $disables;
    private $counter;

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
        $this->player2Dices        = [];
        $this->player1DicesFake    = [];
        $this->player2DicesFake    = [];
        $this->disables        = ["", ""];
        $this->counter    = 0;
    }


    /**
     * Roll all dices save their value.
     *
     * @return void.
     */
    public function roll1()
    {
        // start game
        $this->disable(1);

        //roll this->round
        for ($i=0; $i < 3; $i++) {
            $this->round[$i] = rand(1, 6);
        }

        //add this->round to html
        for ($i=0; $i < 3; $i++) {
            $this->player1Dices[] = $this->round[$i];
        }

        //disable button
        if (in_array(1, $this->round)) {
            $this->disable(0);
        }

        //if one found do not add to sum
        if (in_array(1, $this->round)) {
            for ($i=0; $i < 3; $i++) {
                $this->round[$i] = 0;
            }
        }

        //add 0 to new this->round
        for ($i=0; $i < 3; $i++) {
            $this->player1DicesFake[] = $this->round[$i];
        }

        $this->player1Dices[] = "<br>";


    }


    /**
     * Roll all dices save their value.
     *
     * @return void.
     */
    public function roll2()
    {
        // start game
        $this->disable(0);

        //roll this->round
        for ($i=0; $i < 3; $i++) {
            $this->round[$i] = rand(1, 6);
        }

        //add this->round to html
        for ($i=0; $i < 3; $i++) {
            $this->player2Dices[] = $this->round[$i];
        }

        //disable button
        if (in_array(1, $this->round)) {
            $this->disable(1);
        } else {
            $this->counter++;
        }

        //if one found do not add to sum
        if (in_array(1, $this->round)) {
            for ($i=0; $i < 3; $i++) {
                $this->round[$i] = 0;
            }
        }

        //add 0 to new this->round
        for ($i=0; $i < 3; $i++) {
            $this->player2DicesFake[] = $this->round[$i];
        }

        $this->player2Dices[] = "<br>";


        //give turn after two rolls
        if ($this->counter === 2) {
            $this->disable(1);
            $this->counter = 0;
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
        $results = [array_sum($this->player1DicesFake), array_sum($this->player2DicesFake)];

        if ($results[$index] >= 100) {
            return "GAME OVER";
        }
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
        //enable the other one
        switch ($index) {
            case 0:
                $this->disables[$index + 1] = "";
                break;
            case 1:
                $this->disables[$index - 1] = "";
                break;
        }
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
