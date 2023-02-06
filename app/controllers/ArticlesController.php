<?php
require __DIR__ . "/../include/path.php";
require __DIR__ . "/../include/session.php";
require __DIR__ . "/../dao/ArticleDAO.php";
require __DIR__ . "/../services/ValidationService.php";


$errors = [];
if (isset($_SESSION["errors"]))
{
    unset($_SESSION["errors"]);
}
$validationService = new ValidationService();
$articleDao = new ArticleDAO();

if (isset($_POST["edit-article-save"]))
{
    $id = $validationService->validate($_POST["edit-article-id"]);
    $title = $validationService->validate($_POST["edit-article-title"]);
    $brief = $validationService->validate($_POST["edit-article-brief"]);
    $articleLink = $validationService->validate($_POST["edit-article-link"]);
    $imageLink = $validationService->validate($_POST["edit-article-image-link"]);
    $author = $validationService->validate($_POST["edit-article-author"]);

    if (empty($title) || empty($brief) || empty($articleLink) || empty($imageLink) || empty($author))
    {
        $errors[] = "Field can't be empty";
    }

    if (sizeof($errors) > 0)
    {
        $_SESSION["errors"] = $errors;
        header("Location: " . EDIT_ARTICLE_PAGE . "?id=$id");
    }
    else
    {
        $article = $articleDao->findById($_POST["edit-article-id"]);
        $article->setTitle($title);
        $article->setArticleLink($articleLink);
        $article->setImageLink($imageLink);
        $article->setBrief($brief);
        $article->setAuthor($author);
        $articleDao->update($article);
        header("Location: " . INDEX_PAGE);
    }
}



