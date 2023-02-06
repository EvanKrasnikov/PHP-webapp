<?php

include "BaseDAO.php";
include __DIR__ . "/../model/Article.php";

class ArticleDAO extends BaseDAO
{
    public function save(Article $article): void
    {
        $query = "insert into news.articles (title, article_link, image_link, brief, author) values (:title, :article_link, :image_link, :brief, :author)";
        $this->executePrepared(
            $query,
            [
                ':title' => $article->getTitle(),
                ':article_link' => $article->getArticleLink(),
                ':image_link' => $article->getImageLink(),
                ':brief' => $article->getBrief(),
                ':author' =>  $article->getAuthor()
            ]
        );
    }

    public function findById(string $id): ?Article
    {
        $query = "select * from news.articles where id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':id' => $id
        ]);
        $result = $stmt->fetch();
        return $result ? Article::fromArray($result) : null;
    }

    /**
     * @return Article[]
     */
    public function findAll(): array
    {
        $sql = "select * from news.articles";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function update(Article $article): void
    {
        $query = "update news.articles set title=:title, article_link=:article_link, image_link=:image_link, brief=:brief, author=:author where id=:id";
        $this->executePrepared(
            $query,
            [
                ':title' => $article->getTitle(),
                ':article_link' => $article->getArticleLink(),
                ':image_link' => $article->getImageLink(),
                ':brief' => $article->getBrief(),
                ':author' =>  $article->getAuthor(),
                ':id' => $article->getId()
            ]
        );
    }

    public function deleteById(string $id): void
    {
        $query = "delete from news.articles where id=:id";
        $this->executePrepared(
            $query,
            [
                ':id' => $id
            ]
        );
    }

}