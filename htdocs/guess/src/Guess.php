<?php
/**
 * Guess my number, a class supporting the game through GET, POST and SESSION.
 */
class Guess
{
    /**
     * @var int $number   The current secret number.
     * @var int $tries    Number of tries a guess has been made.
     */
    private $number;
    private $tries;


    /**
     * Constructor to initiate the object with current game settings,
     * if available. Randomize the current number if no value is sent in.
     *
     * @param int $number The current secret number, default -1 to initiate
     *                    the number from start.
     * @param int $tries  Number of tries a guess has been made,
     *                    default 6.
     */

    public function __construct(int $number = -1, int $tries = 6)
    {
        //Short-hand if statement. Randomize if default is set.
        $number === -1 ? $this->number = rand(0, 100) : $this->number = $number;
        //Assign default
        $this->tries = $tries;
    }




    /**
     * Randomize the secret number between 1 and 100 to initiate a new game.
     *
     * @return void
     */

    public function random()
    {
        return $this->number = rand(0, 100);
    }




    /**
     * Get number of tries left.
     *
     * @return int as number of tries made.
     */

    public function tries()
    {
        return $this->tries;
    }




    /**
     * Get the secret number.
     *
     * @return int as the secret number.
     */

    public function number()
    {
        return $this->number;
    }




    /**
     * Make a guess, decrease remaining guesses and return a string stating
     * if the guess was correct, too low or too high or if no guesses remains.
     *
     * @throws GuessException when guessed number is out of bounds.
     *
     * @return string to show the status of the guess made.
     */

    public function makeGuess($number)
    {
        
        if ($number <= 0 || $number >= 100 || $number === null) {
            throw new GuessException("Guess out of bounds.");
        }
        
        switch (true) {
            case $this->tries === 0:
                return "not possible to determine. You have no tries left. Please reset the game";
                break;
            case $number === $this->number:
                $this->tries--;
                return "correct!!!";
                break;
            case $number > $this->number:
                $this->tries--;
                return "too high.";
                break;
            case $number < $this->number:
                $this->tries--;
                return "too low.";
                break;
            default:
                $this->tries--;
                return "correct!!!";
                break;      
        }
    }
}
