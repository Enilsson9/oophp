<?php

/**
 * Guess my number with GET
 */
$app->router->get("gissa/get", function () use ($app) {
    $title = "Gissa (GET)";

    // Get incoming
    $number = $_GET["number"] ?? -1;
    $tries = $_GET["tries"] ?? 6;
    $guess = $_GET["guess"] ?? -1;

    // Start up the game
    $game = new \Edni\Guess\Guess($number, $tries);

    // Reset the game
    if (isset($_GET["reset"])) {
        $game->random();
    }

    // Do a guess
    $res = null;
    if (isset($_GET["doGuess"])) {
        $res = "Your guess {$guess} is {$game->makeGuess($guess)}";
    }

    // Cheat
    if (isset($_GET["doCheat"])) {
        $res = "Cheat : {$game->number()}";
    }

    $data['game'] = $game;
    $data['res'] = $res;
    $data['guess'] = $guess;



    $app->view->add("anax/v2/guess/get", $data);
    return $app->page->render([
        "title" => $title,
    ]);

});

/**
 * Guess my number with POST
 */
$app->router->any(["GET", "POST"], "gissa/post", function () use ($app) {
    $title = "Gissa (POST)";

    // POST incoming
    $number = $_POST["number"] ?? -1;
    $tries = $_POST["tries"] ?? 6;
    $guess = $_POST["guess"] ?? -1;

    // Start up the game
    $game = new \Edni\Guess\Guess($number, $tries);

    // Reset the game
    if (isset($_POST["reset"])) {
        $game->random();
    }

    // Do a guess
    $res = null;
    if (isset($_POST["doGuess"])) {
        $res = "Your guess {$guess} is {$game->makeGuess($guess)}";
    }

    // Cheat
    if (isset($_POST["doCheat"])) {
        $res = "Cheat : {$game->number()}";
    }


    $data['game'] = $game;
    $data['res'] = $res;
    $data['guess'] = $guess;



    $app->view->add("anax/v2/guess/post", $data);
    return $app->page->render([
        "title" => $title,
    ]);

});

/**
 * Guess my number with POST
 */
$app->router->any(["GET", "POST"], "gissa/session", function () use ($app) {
    $title = "Gissa (SESSION)";

    session_name("guess");
    //session_start();
    
    //POST incoming
    $number = $_POST["number"] ?? -1;
    $tries = $_POST["tries"] ?? 6;
    $guess = $_POST["guess"] ?? -1;
    
    // Start up the session game
    if (!isset($_SESSION["game"])) {
        $_SESSION["game"] = new \Edni\Guess\Guess($number, $tries);
    }
    
    // SESSION 
    $game = $_SESSION['game'];
    
    // Reset the game
    if (isset($_POST["reset"])) {
        // Unset all of the session variables.
        $_SESSION = [];
    
        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
    
        // Finally, destroy the session.
        session_destroy();
        //Refresh the page
        header("Refresh:0");
    }
    
    // Do a guess
    $res = null;
    if (isset($_POST["doGuess"])) {
        $res = "Your guess {$guess} is {$game->makeGuess($guess)}";
    }
    
    // Cheat
    if (isset($_POST["doCheat"])) {
        $res = "Cheat : {$game->number()}";
    }

    $data['game'] = $game;
    $data['res'] = $res;
    $data['guess'] = $guess;

    $app->view->add("anax/v2/guess/session", $data);
    return $app->page->render([
        "title" => $title,
    ]);
});
