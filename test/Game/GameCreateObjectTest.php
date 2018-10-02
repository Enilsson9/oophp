<?php

namespace Edni\Game;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class GameCreateObjectTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $game = new Game();
        $this->assertInstanceOf("\Edni\Game\Game", $game);

        $game->roll1();
        $res = count($game->getDices(0));
        $exp = 4;
        $this->assertEquals($exp, $res);
    }



    /**
     * Construct object and verify that the object has the expected
     * properties. Use only first argument.
     */
    public function testCreateObjectFirstArgument()
    {
        $game = new Game(15);
        $this->assertInstanceOf("\Edni\Game\Game", $game);

        $game->roll1();
        $res = count($game->getDices(0));
        $exp = 4;
        $this->assertEquals($exp, $res);
    }



    /**
     * Construct object and verify that the object has the expected
     * properties. Use both arguments.
     */
    public function testCreateObjectBothArguments()
    {
        $game = new Game(15, 25);
        $this->assertInstanceOf("\Edni\Game\Game", $game);

        $game->roll2();
        $res = count($game->getDices(1));
        $exp = 4;
        $this->assertEquals($exp, $res);
    }

    /**
     * Construct object and verify that the object has the expected
     * properties. Use both arguments. And check correct answer
     */

    public function testCreateObjectBothArgumentsDisabledPlayerOne()
    {
        $game = new Game(15, 25);
        $this->assertInstanceOf("\Edni\Game\Game", $game);

        $game->disable(0);
        $res = $game->getDisabled(0);
        $exp = "disabled";
        $this->assertEquals($exp, $res);
    }

    /**
     * Construct object and verify that the object has the expected
     * properties. Use both arguments. And check correct answer
     */

    public function testCreateObjectBothArgumentsDisabledPlayerTwo()
    {
        $game = new Game(15, 25);
        $this->assertInstanceOf("\Edni\Game\Game", $game);

        $game->disable(1);
        $res = $game->getDisabled(1);
        $exp = "disabled";
        $this->assertEquals($exp, $res);
    }
}
