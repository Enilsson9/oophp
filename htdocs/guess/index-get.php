<?php
require "config.php";
require "autoload.php";

// For the view
$title = "Guess my number (GET)";

// Get incoming
$number = $_GET["number"] ?? -1;
$tries = $_GET["tries"] ?? 6;
$guess = $_GET["guess"] ?? -1;

// Start up the game
$game = new Guess($number, $tries);

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

require __DIR__ . "/view/index-get-view.php";
