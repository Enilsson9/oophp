<h1 class="h1">Tärningsspel 100 with 6 dices</h1>
<div class="jumbotron">
    <h2><?= $winner ?></h2>
    <form class="form-signin" method="post">
        <!-- PLAYER ONE -->
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="player1" <?= $game->getDisabled(0); ?>>Player 1</button>
        <h1 class="display-6"><?= implode(", ", $game->getDices(0)) ?>
        <input type="hidden" name="player1"    value="<?= $game->getResults(0) + $player1?>">
        <p class="h6 mb-3 font-weight-normal">Sum is: <?= $game->getResults(0) + $player1?>.</p>
    </form>
    <form class="" method="post">
        <!-- PLAYER TWO -->
        <button class="btn btn-lg btn-danger btn-block" type="submit" name="player2" <?= $game->getDisabled(1); ?>>Player 2</button>
        <h1 class="display-6"><?= implode(", ", $game->getDices(1)) ?>
        <input type="hidden" name="player2"    value="<?= $game->getResults(1) + $player2?>">
        <p class="h6 mb-3 font-weight-normal">Sum is: <?= $game->getResults(1) + $player2?>.</p>
    </form>
</div>
