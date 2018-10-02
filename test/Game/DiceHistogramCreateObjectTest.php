<?php

namespace Edni\Game;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class DiceHistogramCreateObject extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArgumentsMax()
    {
        $game = new \Edni\Game\DiceHistogram();
        $this->assertInstanceOf("\Edni\Game\DiceHistogram", $game);

        $res = $game->getHistogramMax();
        $exp = 6;
        $this->assertEquals($exp, $res);
    }



    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArgumentsMin()
    {
        $game = new \Edni\Game\DiceHistogram();
        $this->assertInstanceOf("\Edni\Game\DiceHistogram", $game);

        $res = $game->getHistogramMin();
        $exp = 1;
        $this->assertEquals($exp, $res);
    }
}
