<?php
/**
 * Guess my number with GET
 */
$app->router->any(["GET", "POST"], "tarningsspel", function () use ($app) {
    $title = "Dice100 (SESSION)";

    // POST incoming
    $player1 = !is_null($app->request->getPost('player1')) ?? 0;
    $player2 = !is_null($app->request->getPost('player2')) ?? 0;

    // Start up the session game
    if (!$app->session->has('game')) {
        $app->session->set('game', new \Edni\Game\Game($player1, $player2));
    }

    // SESSION
    $game = $app->session->get('game');

    // Reset the game
    if (!is_null($app->request->getPost('reset'))) {
        $app->session->destroy();
        //Refresh the page
        header("Refresh:0");
    }

    if (!is_null($app->request->getPost('player1'))) {
        $game->roll1();
    }

    if (!is_null($app->request->getPost('player2'))) {
        $game->roll2();
    }

    if (!is_null($app->request->getPost('turn'))) {
        $game->disable(0);
    }

    $dice = new \Edni\Game\DiceHistogram();
    $histogram = new \Edni\Game\Histogram();

    //Inject class into class
    $histogram->injectData($dice);

    $data['game'] = $game;
    $data['player1'] = $player1;
    $data['player2'] = $player2;
    $data['histogram'] = $histogram;


    $app->view->add("anax/v2/dices/dice100", $data);
        return $app->page->render([
            "title" => $title,
        ]);
});
