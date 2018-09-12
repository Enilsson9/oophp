<?php

/**
 * Guess my number with GET
 */
$app->router->get("tarningsspel", function () use ($app) {
    $title = "Gissa (GET)";

    $dice = new \Edni\Dice\Dice();
    $rolls = 6;
    $res = [];
    $class = [];
    for ($i = 0; $i < $rolls; $i++) {
        $res[] = $dice->roll();
        $class[] = $dice->graphic();
    }

    $data['rolls'] = $rolls;
    $data['class'] = $class;
    $data['res'] = $res;



    $app->view->add("anax/v2/dices/dice100", $data);
    return $app->page->render([
        "title" => $title,
    ]);
});
