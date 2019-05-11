<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PowersupplyRepository")
 */
class Powersupply
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $power;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PFC;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Sizeofcooler;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $max3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $max5;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $max12v1;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $button;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pricedes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $priceardes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $priceemag;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pricejar;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $urldes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $urlardes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $urlemag;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $urljar;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPower(): ?string
    {
        return $this->power;
    }

    public function setPower(string $power): self
    {
        $this->power = $power;

        return $this;
    }

    public function getPFC(): ?string
    {
        return $this->PFC;
    }

    public function setPFC(string $PFC): self
    {
        $this->PFC = $PFC;

        return $this;
    }

    public function getSizeofcooler(): ?string
    {
        return $this->Sizeofcooler;
    }

    public function setSizeofcooler(string $Sizeofcooler): self
    {
        $this->Sizeofcooler = $Sizeofcooler;

        return $this;
    }

    public function getMax3(): ?string
    {
        return $this->max3;
    }

    public function setMax3(string $max3): self
    {
        $this->max3 = $max3;

        return $this;
    }

    public function getMax5(): ?string
    {
        return $this->max5;
    }

    public function setMax5(string $max5): self
    {
        $this->max5 = $max5;

        return $this;
    }

    public function getMax12v1(): ?string
    {
        return $this->max12v1;
    }

    public function setMax12v1(string $max12v1): self
    {
        $this->max12v1 = $max12v1;

        return $this;
    }

    public function getButton(): ?string
    {
        return $this->button;
    }

    public function setButton(string $button): self
    {
        $this->button = $button;

        return $this;
    }

    public function getPricedes(): ?string
    {
        return $this->pricedes;
    }

    public function setPricedes(string $pricedes): self
    {
        $this->pricedes = $pricedes;

        return $this;
    }

    public function getPriceardes(): ?string
    {
        return $this->priceardes;
    }

    public function setPriceardes(string $priceardes): self
    {
        $this->priceardes = $priceardes;

        return $this;
    }

    public function getPriceemag(): ?string
    {
        return $this->priceemag;
    }

    public function setPriceemag(string $priceemag): self
    {
        $this->priceemag = $priceemag;

        return $this;
    }

    public function getPricejar(): ?string
    {
        return $this->pricejar;
    }

    public function setPricejar(string $pricejar): self
    {
        $this->pricejar = $pricejar;

        return $this;
    }

    public function getUrldes(): ?string
    {
        return $this->urldes;
    }

    public function setUrldes(string $urldes): self
    {
        $this->urldes = $urldes;

        return $this;
    }

    public function getUrlardes(): ?string
    {
        return $this->urlardes;
    }

    public function setUrlardes(string $urlardes): self
    {
        $this->urlardes = $urlardes;

        return $this;
    }

    public function getUrlemag(): ?string
    {
        return $this->urlemag;
    }

    public function setUrlemag(string $urlemag): self
    {
        $this->urlemag = $urlemag;

        return $this;
    }

    public function getUrljar(): ?string
    {
        return $this->urljar;
    }

    public function setUrljar(string $urljar): self
    {
        $this->urljar = $urljar;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
