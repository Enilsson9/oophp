<div class="jumbotron">
    <h1 class="display-3">Text filter</h1>
    <hr class="my-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-5">BBcode</h1>
                <hr class="my-4">

                <p class="text-primary">Source</p>

                <hr class="my-4">
                <pre><?= wordwrap(htmlentities($text1)) ?></pre>
                <hr class="my-4">

                <p class="text-secondary">Filtered</p>

                <hr class="my-4">
                <pre><?= wordwrap(htmlentities($bbcode)) ?></pre>
                <hr class="my-4">

                <p class="text-success">HTML <strong>(nl2br)</strong></p>

                <hr class="my-4">
                <?= $filter->parse($bbcode, ["nl2br"]); ?>
                <hr class="my-4">
            </div>
            <div class="col">
                <h1 class="display-5">Link</h1>
                <hr class="my-4">

                <p class="text-primary">Source</p>

                <hr class="my-4">
                <pre><?= wordwrap(htmlentities($text2)) ?></pre>
                <hr class="my-4">

                <p class="text-secondary">Filtered</p>

                <hr class="my-4">
                <pre><?= wordwrap(htmlentities($link)) ?></pre>
                <hr class="my-4">

                <p class="text-success">HTML <strong>(nl2br)</strong></p>

                <hr class="my-4">
                <?= $filter->parse($link, ["nl2br"]); ?>
                <hr class="my-4">
            </div>
            <div class="col">
                <h1 class="display-5">Markdown</h1>
                <hr class="my-4">

                <p class="text-primary">Source</p>

                <hr class="my-4">
                <pre><?= $text3 ?></pre>
                <hr class="my-4">

                <p class="text-secondary">Filtered</p>

                <hr class="my-4">
                <pre><?= htmlentities($markdown) ?></pre>
                <hr class="my-4">

                <p class="text-success">HTML <strong>(nl2br)</strong></p>

                <hr class="my-4">
                <?= $markdown ?>
                <hr class="my-4">
            </div>
            <div class="col">
                <h1 class="display-5">BBcode + Link + Markdown</h1>
                <hr class="my-4">

                <p class="text-primary">Source</p>

                <hr class="my-4">
                <pre><?= wordwrap(htmlentities($text4)) ?></pre>
                <hr class="my-4">

                <p class="text-secondary">Filtered</p>

                <hr class="my-4">
                <pre><?= wordwrap(htmlentities($combined)) ?></pre>
                <hr class="my-4">

                <p class="text-success">HTML <strong>(nl2br)</strong></p>

                <hr class="my-4">
                <?= $filter->parse($combined, ["nl2br"]); ?>
                <hr class="my-4">
            </div>
        </div>
    </div>
</div>
