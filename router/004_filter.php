<?php

/**
 * Filtering
 */

$app->router->any(["GET", "POST"], "textfilter", function () use ($app) {


    $title = "TextFilter";
    $filter = new \Edni\Filter\Filter();

    $text1 = "En [b]fet[/b] moped.";
    $bbcode = $filter->parse($text1, ["bbcode"]);

    $text2 = "http://dbwebb.se";
    $link = $filter->parse($text2, ["link"]);

    $text3 = "[link to dbwebb.se](http://dbwebb.se).";

    $markdown = $filter->parse($text3, ["markdown"]);

    $text4 = "### En [b]fet[/b] moped på http://blocket.se {#id3}";


    $combined = $filter->parse($text4, ["bbcode", "link", "markdown"]);

    $data['bbcode'] = $bbcode;
    $data['link'] = $link;
    $data['markdown'] = $markdown;
    $data['combined'] = $combined;
    $data['filter'] = $filter;

    $data['text1'] = $text1;
    $data['text2'] = $text2;
    $data['text3'] = $text3;
    $data['text4'] = $text4;

    $app->view->add("anax/v2/filter/filter", $data);
        return $app->page->render([
            "title" => $title,
        ]);
});
