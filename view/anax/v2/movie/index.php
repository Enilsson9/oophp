<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="navbar-nav">
        <a class="nav-item nav-link" href="?">Show all movies</a> 
        <a class="nav-item nav-link" href="?route=search-title">Search title</a> 
        <a class="nav-item nav-link" href="?route=search-year">Search year</a> 
        <a class="nav-item nav-link" href="?route=movie-select">Select</a> 
        <a class="nav-item nav-link" href="?route=show-all-sort">Show all sortable</a> 
        <a class="nav-item nav-link" href="?route=show-all-paginate">Show all paginate</a> 
        <!--<a class="nav-item nav-link" href="?route=select">SELECT *</a>--> 
    </div>
</nav>


<?php
foreach ($view as $value) {
    require $value;
}
?>
