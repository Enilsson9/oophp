<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?>
<body class="text-center container">
    <h1 class="h1">Rolling <?= $rolls ?> graphical dices</h1>
    <div class="jumbotron">
        <ul class="dice-utf8">
        <?php foreach ($class as $value) : ?>
            <li class=" dice-sprite <?= $value ?>"></li>
        <?php endforeach; ?>
        </ul>

        <p><?= implode(", ", $res) ?></p>
        <p>Sum is: <?= array_sum($res) ?>.</p>
        <p>Average is: <?= round(array_sum($res) / 6, 1) ?>.</p>
    </div>
</body>
