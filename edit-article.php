<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Edit the article</title>
</head>

<body>
<?php
require_once "app/include/path.php";
require_once "app/dao/ArticleDAO.php";
require_once "app/services/ValidationService.php";

include "app/include/header.php";

$articleDao = new ArticleDAO();

if (isset($_GET["id"]))
{
    $article = $articleDao->findById($_GET["id"]);
}
//else
//{
//    $errorMsg = "Article id doesn't set";
//}

if (isset($_POST["edit-article-save"]))
{
    $validationService = new ValidationService();
    $id = $validationService->validate($_POST["edit-article-id"]);
    $title = $validationService->validate($_POST["edit-article-title"]);
    $brief = $validationService->validate($_POST["edit-article-brief"]);
    $articleLink = $validationService->validate($_POST["edit-article-link"]);
    $imageLink = $validationService->validate($_POST["edit-article-image-link"]);
    $author = $validationService->validate($_POST["edit-article-author"]);

    if (empty($title) || empty($brief) || empty($articleLink) || empty($imageLink) || empty($author))
    {
        $errorMsg = "Field can't be empty";
    }

    $article = $articleDao->findById($_POST["edit-article-id"]);
    $article->setTitle($title);
    $article->setArticleLink($articleLink);
    $article->setImageLink($imageLink);
    $article->setBrief($brief);
    $article->setAuthor($author);
    $articleDao->update($article);

    header("Location: " . INDEX_PAGE);
}

if (isset($_POST["edit-article-cancel"]))
{
    header("Location: " . INDEX_PAGE);
}
?>

<div class="container">
    <h2>Edit the article</h2>
    <?php if (isset($errorMsg)) : ?>
        <p>
            <?php echo $errorMsg; ?>
        </p>
    <?php endif; ?>
    <form action="edit-article.php" method="post">
        <div class="form-container">
            <input
                    type="hidden"
                    name="edit-article-id"
                    id="edit-article-id"
                    value="<?php echo $article->getId(); ?>"
            >
            <div class="input-group">
                <label for="edit-article-title">Title</label>
                <input
                        type="text"
                        class="form-control"
                        name="edit-article-title"
                        id="edit-article-title"
                        value="<?php echo $article->getTitle(); ?>"
                >
            </div>
            <div class="input-group">
                <label for="edit-article-brief">Brief</label>
                <textarea
                        name="edit-article-brief"
                        id="edit-article-brief"
                    ><?php echo $article->getBrief(); ?>
                </textarea>
            </div>
            <div class="input-group">
                <label for="edit-article-link">Article location</label>
                <input
                        type="text"
                        class="form-control"
                        name="edit-article-link"
                        id="edit-article-link"
                        value="<?php echo $article->getArticleLink(); ?>"
                >
            </div>
            <div class="input-group">
                <label for="edit-article-image-link">Image location</label>
                <input
                        type="text"
                        name="edit-article-image-link"
                        id="edit-article-image-link"
                        value="<?php echo $article->getImageLink(); ?>"
                >

            </div>
            <div class="input-group">
                <label for="edit-article-author">Author</label>
                <input
                        type="text"
                        name="edit-article-author"
                        id="edit-article-author"
                        value="<?php echo $article->getAuthor(); ?>"
                >
            </div>
            <div class="input-group">
                <button type="submit" name="edit-article-save" id="edit-article-save">Save</button>
                <button type="submit" name="edit-article-cancel" id="edit-article-cancel">Cancel</button>
            </div>
        </div>
    </form>
</div>

<?php include "app/include/footer.php"; ?>
</body>
</html>
