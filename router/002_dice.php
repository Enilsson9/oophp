<?php

/**
 * Guess my number with GET
 */
$app->router->any(["GET", "POST"], "tarningsspel", function () use ($app) {

    // POST incoming
    $player1 = $_POST["player1"] ?? 0;
    $player2 = $_POST["player2"] ?? 0;

    // Start up the game
    $game = new \Edni\Game\Game($player1, $player2);

    $winner = "";

    if (isset($_POST["player1"])) {
        $game->roll1();
        $total = $game->getResults(0) + $player1;
        if ($total >= 100) {
            $winner = "Game over. Reload page to restart";
            $game->disable(0);
            $game->disable(1);
        }

        if (in_array(1, $game->getDices(0))) {
            $game->disable(0);
        } else {
            $game->disable(1);
        }
    }

    if (isset($_POST["player2"])) {
        $game->roll2();
        $total = $game->getResults(1) + $player2;
        if ($total >= 100) {
            $winner = "Game over. Reload page to restart";
            $game->disable(0);
            $game->disable(1);
        }

        if (in_array(1, $game->getDices(1))) {
            $game->disable(1);
        } else {
            $game->disable(0);
        }
    }

    $data['total'] = $total;
    $data['game'] = $game;
    $data['winner'] = $winner;
    $data['player1'] = $player1;
    $data['player2'] = $player2;


    $app->view->add("anax/v2/dices/dice100", $data);
        return $app->page->render([]);
});
