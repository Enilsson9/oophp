<?php

namespace Edni\Dice;

/**
* Showing off a standard class with methods and properties.
*/
class Dice
{
    /**
    * @var Dice $sides   Array consisting of dices.
    * @var int  $lastRoll  Array consisting of last roll of the dices.
    */

    private $sides;
    private $lastRoll;
    //protected $lastRoll;

    /**
    * Constructor to initiate the dicehand with a number of dices.
    *
    * @param int sides Number of sides to create, defaults to six.
    */
    public function __construct(int $sides = 6)
    {
        $this->sides = $sides;
    }

    /**
    * Roll all dices save their value.
    *
    * @return int.
    */
    public function getSides()
    {
        return $this->sides;
    }


    /**
    * Roll all dices save their value.
    *
    * @return int.
    */

    public function roll()
    {
        $dice = rand(1, 6);
        $this->lastRoll = $dice;

        return $dice;
    }


    /**
    * Roll all dices save their value.
    *
    * @return void.
    */
    public function getLastRoll()
    {
        return $this->lastRoll;
    }

    /**
    * Get a graphic value of the last rolled dice.
    *
    * @return string as graphical representation of last rolled dice.
    */
    public function graphic()
    {
        return "dice-" . $this->getLastRoll();
        //return "dice-" . $this->lastRoll;
    }
}
