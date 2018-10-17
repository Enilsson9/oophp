<?php
// Render the page
require "view/header.php";
foreach ($view as $value) {
    require $value;
}
require "view/footer.php";
