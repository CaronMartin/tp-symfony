<?php

namespace App\Entity;

use DateTime;

class ArticleV1
{
    private string $title;
    private string $subtitle;
    private DateTime $createdAt;
    private string $author;
    private string $body;
    private string $image;


    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }


    public function getSubTitle(): string
    {
        return $this->subtitle;
    }

    public function setSubTitle(string $subtitle): void
    {
        $this->subtitle = $subtitle;
    }


    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }


    public function getBody(): string
    {
        return $this->author;
    }

    public function setBody(string $body): void
    {
        $this->body = $body;
    }


    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }


}

?>