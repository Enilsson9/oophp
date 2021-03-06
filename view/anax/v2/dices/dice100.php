<h1 class="h1">Tärningsspel100 with 3 dices</h1>
<div class="jumbotron">
    <h1 display="2">Rules:</h1>
    <p class="lead">If you get a 1 on round, you will get 0 points for that round and lose your turn.</p>
    <p>The one who gets to 100 first wins. Good luck!</p>
    </ul>
    <hr class="my-4">

    <h3 display="2">Histogram:</h3  >
    <p>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#player" aria-expanded="false" aria-controls="player">
        Player
        </button>
        <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#pc" aria-expanded="false" aria-controls="pc">
        PC
        </button>
    </p>
    <div class="collapse" id="player">
      <div class="card card-body">
        <?= $histogram->getAsText($game->getDicesHistogram(0)); ?>
      </div>
    </div>

    <div class="collapse" id="pc">
      <div class="card card-body">
        <?= $histogram->getAsText($game->getDicesHistogram(1)); ?>
      </div>
    </div>

    <form class="form-signin" action="" method="post">
        <?php if (!is_null($app->request->getPost('player1'))) : ?>
            <button class="btn btn-md btn-warning btn-block" type="submit" name="turn" <?= $game->getDisabled(0); ?>>Give away turn to PC</button>
        <?php endif; ?>
    </form>

    <form class="form-signin" method="post">

        <!-- PLAYER ONE -->
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="player1" <?= $game->getDisabled(0); ?>>Player</button>
        <h1 class="display-6"><?= implode("   ", $game->getDices(0)); ?>
        <input type="hidden" name="player1"    value="<?= $game->getResults(0)?>">
        <p class="h6 mb-3 font-weight-normal">Sum is: <?= $game->getResults(0)?>.</p>
    </form>



    <form class="form-signin" method="post">
        <!-- PLAYER TWO -->
        <button class="btn btn-lg btn-secondary btn-block" type="submit" name="player2" <?= $game->getDisabled(1); ?>>PC</button>
        <h1 class="display-6"><?= implode("   ", $game->getDices(1)) ?>
        <input type="hidden" name="player2"    value="<?= $game->getResults(1)?>">
        <p class="h6 mb-3 font-weight-normal">Sum is: <?= $game->getResults(1)?>.</p>
    </form>


    <form class="" action="" method="post">
        <button type="submit" class="btn btn-md btn-danger text-center" name="reset">Reset</button>
    </form>
</div>
