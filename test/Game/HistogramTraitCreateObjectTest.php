<?php

namespace Edni\Game;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class HistogramTraitCreateObject extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $game = new \Edni\Game\DiceHistogram();
        $this->assertInstanceOf("\Edni\Game\DiceHistogram", $game);

        $serie = [1, 2, 3];
        $res = $game->printHistogram(1, 6);
        $exp = '<li>';
        $this->assertContains($exp, $res);
    }


    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArgumentsSerie()
    {
        $game = new \Edni\Game\DiceHistogram();
        $this->assertInstanceOf("\Edni\Game\DiceHistogram", $game);

        $res = $game->getHistogramSerie();
        $exp = [];
        $this->assertEquals($exp, $res);
    }
}
