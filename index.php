<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <title>Recent news</title>
</head>

<body>
<?php
require_once "app/include/path.php";
require_once "app/dao/ArticleDAO.php";
require_once "app/model/Article.php";

include "app/include/header.php";
?>


<div class="container">
    <h2>Last publications</h2>

    <?php
    $articleDao = new ArticleDAO();
    $articles = $articleDao->findAll();

    foreach ($articles as $key => $array):
        $article = Article::fromArray($array);
        ?>
        <article class="card">
            <div class="card-img">
                <img src="<?php echo $article->getImageLink(); ?>" alt="image">
            </div>
            <div class="card-info-wrapper">
                <div class="card-info">
                    <p>
                        <strong>
                            <a href="<?php echo $article->getArticleLink() ?>">
                                <?php echo $article->getTitle(); ?>
                            </a>
                        </strong>
                    </p>
                    <p><?php echo $article->getBrief(); ?></p>
                    <div class="card-info-author">
                        <i><?php echo $article->getAuthor(); ?></i>
                        <i><?php echo $article->getCreationDate(); ?></i>
                    </div>
                </div>
                <?php if (isset($_SESSION["email"])): ?>
                    <div class="card-manage">
                        <button onclick="load('edit-article.php?id=<?php echo $article->getId(); ?>')">
                            Edit
                        </button>
                        <button onclick="load('delete-article.php?id=<?php echo $article->getId(); ?>')">
                            Delete
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </article>
    <?php endforeach; ?>
</div>

<?php include "app/include/footer.php"; ?>
</body>
</html>
