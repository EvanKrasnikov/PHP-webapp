<?php

include "app/include/path.php";
include "app/dao/ArticleDAO.php";

if (isset($_GET["id"]))
{
    $articleDao = new ArticleDAO();
    $articleDao->deleteById($_GET["id"]);
    header("Location: " . INDEX_PAGE);
}

?>
