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
    <div class="title"><h2>Last publications</h2></div>

    <?php
    foreach ($_SESSION as $a){
        echo $a;
    }
    ?>

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
                    <p><strong><?php echo $article->getTitle(); ?></strong></p>
                    <p><?php echo $article->getBrief(); ?></p>
                    <span>

            </span>
                    <i><?php echo $article->getAuthor(); ?></i>
                    <p><?php echo $article->getCreationDate(); ?></p>
                </div>
                <?php if (isset($_SESSION["email"])): ?>
                    <div class="article-manage">
                        <a href="edit-article.php?id=<?php echo $article->getId(); ?>" class="edit_btn" >
                            <button>
                                Edit
                            </button>
                        </a>
                        <a href="delete-article.php?id=<?php echo $article->getId(); ?>" class="del_btn">
                            <button>
                                Delete
                            </button>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </article>
    <?php endforeach; ?>
</div>






<!--<div class="container">-->
<!--    <div class="content row">-->
<!--        <div class="main-content col-md-9 col-12">-->
<!--            <h2>Last publications</h2>-->
<!---->
<!--            --><?php
//            $articleDao = new ArticleDAO();
//            $articles = $articleDao->findAll();
//
//            foreach ($articles as $key => $array):
//                $article = Article::fromArray($array);
//            ?>
<!--            <div class="row mb-3 shadow-lg">-->
<!--                <div class="img col-4">-->
<!--                    <img src="--><?php //echo $article->getImageLink() ?><!--" alt="--><?php //echo $article->getArticleLink() ?><!--">-->
<!--                </div>-->
<!--                <div class="col-8 ">-->
<!--                    <h3>-->
<!--                        <a href="--><?php //echo $article->getArticleLink() ?><!--">--><?php //echo $article->getTitle() ?><!--</a>-->
<!--                    </h3>-->
<!--                    <i class="fa-solid fa-user">--><?php //echo $article->getAuthor() ?><!--</i>-->
<!--                    <i class="fa-regular fa-calendar">--><?php //echo $article->getCreationDate() ?><!--</i>-->
<!--                    <p class="preview-text">--><?php //echo $article->getBrief() ?><!--</p>-->
<!--                </div>-->
<!--            </div>-->
<!--            --><?php //endforeach; ?>
<!---->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<?php include "app/include/footer.php"; ?>
</body>
</html>
