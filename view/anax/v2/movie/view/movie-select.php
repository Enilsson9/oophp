<form method="post">
    <fieldset>
    <legend>Select Movie</legend>

    <p>
        <label>Movie:<br>
        <select name="movieId">
            <option value="">Select movie...</option>
            <?php foreach ($movies as $movie) : ?>
            <option value="<?= $movie->id ?>"><?= $movie->title ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    </p>

    <p>
        <input type="submit" name="doAdd" value="Add" class="btn btn-primary">
        <input type="submit" name="doEdit" value="Edit" class="btn btn-warning">
        <input type="submit" name="doDelete" value="Delete" class="btn btn-danger">
    </p>
    <p><a href="?">Show all</a></p>
    </fieldset>
</form>
