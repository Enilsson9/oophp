<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="style/signin.css" rel="stylesheet">
</head>
<body class="text-center">
    <form class="form-signin" method="GET">
        <h1 class="h3 mb-3 font-weight-normal">Guess a number (GET)</h1>
        <p class="mb-3 font-weight-bold">Guess a number between 1 and 100.</p> 
        <p class="h6 mb-3 font-weight-normal">You have <?= $game->tries() ?> tries left.</p>
        <input type="hidden" name="number"   value="<?= $game->number() ?>">
        <input type="hidden" name="tries"    value="<?= $game->tries() ?>">
        <input type="number" name="guess" class="btn-block" placeholder="Your guess" autofocus>
        <p class="h5 mb-3 font-weight-bold btn-block"><?= $res ?></p>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="doGuess">Make a guess</button>
        <button class="btn btn-lg btn-danger btn-block" type="submit" name="doCheat">Cheat</button>
        <p class="btn-block"><a href="?reset">Reset</a></p>
        <p class="mt-5 mb-3 text-muted">&copy; Edward Nilsson 2018</p>
    </form>
</body>
</html>
