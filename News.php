<?php
/**
 * Created by PhpStorm.
 * User: filip
 * Date: 5/6/2019
 * Time: 1:03 PM
 */

namespace App\Entity;

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsRepository")
 */
class News
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $date;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $summary;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $author;


    /**
     * @ORM\Column(type="string", length=2000)
     */
    private $description;


    public function getId() :?int
    {
        return $this->id;
    }

    public function getTitle() :?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getDate() :?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;
        return $this;

    }

    public function getSummary() :?string
    {
        return $this->summary;
    }


    public function setSummary($summary): self
    {
        $this->summary = $summary;
        return $this;
    }

    public function getAuthor() :?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;
        return $this;
    }


    public function getDescription() :?string
    {
        return $this->description;
    }


    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }
}