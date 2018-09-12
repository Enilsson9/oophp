<?php
require "config.php";
require "autoload.php";

// For the view
$title = "Guess my number (SESSION)";

session_name("guess");
session_start();

//POST incoming
$number = $_POST["number"] ?? -1;
$tries = $_POST["tries"] ?? 6;
$guess = $_POST["guess"] ?? -1;

// Start up the session game
if (!isset($_SESSION["game"])) {
    $_SESSION["game"] = new Guess($number, $tries);
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

require __DIR__ . "/view/index-session-view.php";
