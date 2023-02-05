<?php
class Article
{
    private string $id, $title, $articleLink, $imageLink, $brief, $author, $creationDate;

    /**
     * @param string $id
     * @param string $title
     * @param string $articleLink
     * @param string $imageLink
     * @param string $brief
     * @param string $author
     * @param string $creationDate
     */
    public function __construct(
        string $id,
        string $title,
        string $articleLink,
        string $imageLink,
        string $brief,
        string $author,
        string $creationDate
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->articleLink = $articleLink;
        $this->imageLink = $imageLink;
        $this->brief = $brief;
        $this->author = $author;
        $this->creationDate = $creationDate;
    }


    /**
     * @param array $arr
     * @return Article
     */
    public static function fromArray(array $arr) : Article
    {
        return new Article(
            $arr["id"],
            $arr["title"],
            $arr["article_link"],
            $arr["image_link"],
            $arr["brief"],
            $arr["author"],
            $arr["creation_date"]
        );
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getArticleLink(): string
    {
        return $this->articleLink;
    }

    /**
     * @param string $articleLink
     */
    public function setArticleLink(string $articleLink): void
    {
        $this->articleLink = $articleLink;
    }

    /**
     * @return string
     */
    public function getImageLink(): string
    {
        return $this->imageLink;
    }

    /**
     * @param string $imageLink
     */
    public function setImageLink(string $imageLink): void
    {
        $this->imageLink = $imageLink;
    }

    /**
     * @return string
     */
    public function getBrief(): string
    {
        return $this->brief;
    }

    /**
     * @param string $brief
     */
    public function setBrief(string $brief): void
    {
        $this->brief = $brief;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getCreationDate(): string
    {
        return $this->creationDate;
    }

}

?>
