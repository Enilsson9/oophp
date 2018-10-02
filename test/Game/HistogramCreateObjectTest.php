<?php

namespace Edni\Game;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class HistogramCreateObject extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $game = new \Edni\Game\Histogram();
        $this->assertInstanceOf("\Edni\Game\Histogram", $game);

        $serie = [1, 2, 3];


        $res = $game->getAsText($serie);
        $exp = '*';
        $this->assertContains($exp, $res);
    }



    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArgumentsMin()
    {
        $game = new \Edni\Game\Histogram();
        $this->assertInstanceOf("\Edni\Game\Histogram", $game);

        $dice = new \Edni\Game\DiceHistogram();
        $game->injectData($dice);


        $res = $game->min;
        $exp = 1;
        $this->assertEquals($exp, $res);
    }


    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArgumentsMax()
    {
        $game = new \Edni\Game\Histogram();
        $this->assertInstanceOf("\Edni\Game\Histogram", $game);

        $dice = new \Edni\Game\DiceHistogram();

        $game->injectData($dice);


        $res = $game->max;
        $exp = 6;
        $this->assertEquals($exp, $res);
    }
}
