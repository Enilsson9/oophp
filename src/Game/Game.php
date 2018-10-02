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
    private $player1Dices        = [];
    private $player2Dices        = [];
    private $player1DicesFake    = [];
    private $player2DicesFake    = [];
    private $player1DicesHisto    = [];
    private $player2DicesHisto    = [];
    private $disables            = ["", ""];

    /**
     * Constructor to initiate the dicehand with a number of dices.
     *
     * @param int $dices Number of dices to create, defaults to five.
     */
    public function __construct($player1 = 0, $player2 = 0)
    {
        $this->$player1        = $player1;
        $this->$player2        = $player2;
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
            $this->player1DicesHisto[] = $this->round[$i];
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
            $this->player2DicesHisto[] = $this->round[$i];
        }

        //disable button
        if (in_array(1, $this->round)) {
            $this->disable(1);
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


        /*
        * AI, sluta rulla efter:
        */

        //if player is less stop rolling
        if ($this->getResults(0) < $this->getResults(1)) {
            $this->disable(1);
        }

        $player1 = array_count_values($this->player1DicesHisto);
        $player2 = array_count_values($this->player2DicesHisto);

        //check ones (1) on histogram
        if (isset($player1[1]) > isset($player2[1])) {
            $this->disable(1);
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
     * Roll all dices save their value.
     *
     * @return void.
     */
    public function getDicesHistogram($index)
    {
        $results = [$this->player1DicesHisto, $this->player2DicesHisto];
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
            $this->disables[0];
            $this->disables[1];
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
