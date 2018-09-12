<?php
require "config.php";
require "autoload.php";

// For the view
$title = "Guess my number (POST)";

// POST incoming
$number = $_POST["number"] ?? -1;
$tries = $_POST["tries"] ?? 6;
$guess = $_POST["guess"] ?? -1;

// Start up the game
$game = new Guess($number, $tries);

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

require __DIR__ . "/view/index-post-view.php";
