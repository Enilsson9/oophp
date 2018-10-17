<?php

/**
 * Filtering
 */

$app->router->any(["GET", "POST"], "content", function () use ($app) {
    $title = "CMS";
    // Get incoming
    $route = $app->request->getGet("route", "");
    $filter = new \Edni\Filter\Filter();

    // General variabels (available to the views)
    $titleExtended = " | My Content Database";
    $view = [];
    $app->db->connect();
    $sql = null;
    $resultset = null;
    $content = null;

    // Simple router
    switch ($route) {
        case "":
            $title = "Show all content";
            $view[] = "view/show-all.php";
            $sql = "SELECT * FROM content;";
            $resultset = $app->db->executeFetchAll($sql);
            break;

        case "reset":
            $title = "Resetting the database";
            $view[] = "view/reset.php";
            break;

        case "admin":
            $title = "Admin content";
            $view[] = "view/admin.php";
            $sql = "SELECT * FROM content;";
            $resultset = $app->db->executeFetchAll($sql);
            break;

        case "edit":
            $title = "Edit content";
            $view[] = "view/edit.php";
            $contentId = $app->request->getPost("contentId") ?: $app->request->getGet("id");
            if (!is_numeric($contentId)) {
                die("Not valid for content id.");
            }

            if (hasKeyPost("doDelete")) {
                header("Location: ?route=delete&id=$contentId");
                exit;
            } elseif (hasKeyPost("doSave"))  {

                //get all paramenters
                $params = $app->request->getPost();
                //reorder array
                array_pop($params);
                $first = array_shift($params);
                array_push($params, $first);

                if (!$params["contentSlug"]) {
                    $params["contentSlug"] = slugify($params["contentTitle"]);
                }

                if (!$params["contentPath"]) {
                    $params["contentPath"] = null;
                }

                //Filter checkbox
                if (!$params["contentFilter"]) {
                    $params["contentFilter"] = null;
                } else {
                    $params["contentData"] = nl2br($filter->parse($params["contentData"], $params["contentFilter"]));
                    $params["contentFilter"] = implode("-", $params["contentFilter"]);
                }



                $sql = "UPDATE content SET title=?, path=?, slug=?, data=?, type=?, filter=?, published=? WHERE id = ?;";
                $app->db->execute($sql, array_values($params));
                header("Location: ?route=edit&id=$contentId");
                exit;
            }

            $sql = "SELECT * FROM content WHERE id = ?;";
            $content = $app->db->executeFetch($sql, [$contentId]);
            break;

        case "create":
            $title = "Create content";
            $view[] = "view/create.php";

            if (hasKeyPost("doCreate")) {
                $title = $app->request->getPost("contentTitle");

                $sql = "INSERT INTO content (title) VALUES (?);";
                $app->db->execute($sql, [$title]);
                $id = $app->db->lastInsertId();
                header("Location: ?route=edit&id=$id");
                exit;
            }


            break;

        case "delete":
            $title = "Delete content";
            $view[] = "view/delete.php";
            $contentId = $app->request->getPost("contentId") ?: $app->request->getGet("id");
            if (!is_numeric($contentId)) {
                die("Not valid for content id.");
            }

            if (hasKeyPost("doDelete")) {
                $contentId = $app->request->getPost("contentId");
                $sql = "UPDATE content SET deleted=NOW() WHERE id=?;";
                $app->db->execute($sql, [$contentId]);
                header("Location: ?route=admin");
                exit;
            }

            $sql = "SELECT id, title FROM content WHERE id = ?;";
            $content = $app->db->executeFetch($sql, [$contentId]);
            break;

        case "pages":
            $title = "View pages";
            $view[] = "view/pages.php";

            $sql = <<<EOD
SELECT
    *,
    CASE
        WHEN (deleted <= NOW()) THEN "isDeleted"
        WHEN (published <= NOW()) THEN "isPublished"
        ELSE "notPublished"
    END AS status
FROM content
WHERE type=?
;
EOD;
            $resultset = $app->db->executeFetchAll($sql, ["page"]);
            break;

        case "blog":
            $title = "View blog";
            $view[] = "view/blog.php";

            $sql = <<<EOD
SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
FROM content
WHERE type=?
ORDER BY published DESC
;
EOD;
            $resultset = $app->db->executeFetchAll($sql, ["post"]);
            break;

        default:
            if (substr($route, 0, 5) === "blog/") {
                //  Matches blog/slug, display content by slug and type post
                $sql = <<<EOD
SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
FROM content
WHERE
    slug = ?
    AND type = ?
    AND (deleted IS NULL OR deleted > NOW())
    AND published <= NOW()
ORDER BY published DESC
;
EOD;
                $slug = substr($route, 5);
                $content = $app->db->executeFetch($sql, [$slug, "post"]);
                if (!$content) {
                    header("HTTP/1.0 404 Not Found");
                    $title = "404";
                    $view[] = "view/404.php";
                    break;
                }
                $title = $content->title;
                $view[] = "view/blogpost.php";
            } else {
                // Try matching content for type page and its path
                $sql = <<<EOD
SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS modified_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS modified
FROM content
WHERE
    path = ?
    AND type = ?
    AND (deleted IS NULL OR deleted > NOW())
    AND published <= NOW()
;
EOD;
                $content = $app->db->executeFetch($sql, [$route, "page"]);
                if (!$content) {
                    header("HTTP/1.0 404 Not Found");
                    $title = "404";
                    $view[] = "view/404.php";
                    break;
                }
                $title = $content->title;
                $view[] = "view/page.php";
            }
    };

    $data['resultset'] = $resultset;
    $data['content'] = $content;
    $data['view'] = $view;


    $app->view->add("anax/v2/crud/index", $data);
        return $app->page->render([
            "title" => $title,
        ]);
});
