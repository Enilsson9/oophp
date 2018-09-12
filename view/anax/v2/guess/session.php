<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?>
<form class="form-signin" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">Guess a number (SESSION)</h1>
        <p class="mb-3 font-weight-bold">Guess a number between 1 and 100.</p> 
        <p class="h6 mb-3 font-weight-normal">You have <?= $game->tries() ?> tries left.</p>
        <input type="number" name="guess" class="btn-block" placeholder="Your guess" autofocus>
        <!-- start PHP -->
        <?php if (isset($res) || isset($POST_["doCheat"])) : ?>
        <p class="h5 mb-3 font-weight-bold btn-block"><?= $res ?></p>
        <?php endif; ?>
         <!-- end PHP -->
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="doGuess">Make a guess</button>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="doCheat">Cheat</button>
        <button class="btn btn-lg btn-danger btn-block" type="submit" name="reset">Reset</button>
        <p class="mt-5 mb-3 text-muted">&copy; Edward Nilsson 2018</p>
</form>
