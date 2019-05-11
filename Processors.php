<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProcessorsRepository")
 */
class Processors
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $Type;

    /**
     * @ORM\Column(type="integer")
     */
    private $Cores;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $Socket;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $Clockrate;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $Cache;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $pricedes;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $priceardes;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $priceemag;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $pricejar;

    /**
     * @ORM\Column(type="string", length=600)
     */
    private $urldes;

    /**
     * @ORM\Column(type="string", length=600)
     */
    private $urlardes;

    /**
     * @ORM\Column(type="string", length=600)
     */
    private $urljar;

    /**
     * @ORM\Column(type="string", length=600)
     */
    private $urlemag;

    /**
     * @ORM\Column(type="string", length=800)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $Brand;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getCores(): ?int
    {
        return $this->Cores;
    }

    public function setCores(int $Cores): self
    {
        $this->Cores = $Cores;

        return $this;
    }

    public function getSocket(): ?string
    {
        return $this->Socket;
    }

    public function setSocket(string $Socket): self
    {
        $this->Socket = $Socket;

        return $this;
    }

    public function getClockrate(): ?string
    {
        return $this->Clockrate;
    }

    public function setClockrate(string $Clockrate): self
    {
        $this->Clockrate = $Clockrate;

        return $this;
    }

    public function getCache(): ?string
    {
        return $this->Cache;
    }

    public function setCache(string $Cache): self
    {
        $this->Cache = $Cache;

        return $this;
        }

    public function getPricedes()
    {
        return $this->pricedes;
    }

    public function setPricedes($pricedes): self
    {
        $this->pricedes = $pricedes;

        return $this;
    }

    public function getPriceardes()
    {
        return $this->priceardes;
    }

    public function setPriceardes($priceardes): self
    {
        $this->priceardes = $priceardes;

        return $this;
    }

    public function getPriceemag()
    {
        return $this->priceemag;
    }

    public function setPriceemag($priceemag): self
    {
        $this->priceemag = $priceemag;

        return $this;
    }

    public function getPricejar()
    {
        return $this->pricejar;
    }

    public function setPricejar($pricejar): self
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

    public function getUrljar(): ?string
    {
        return $this->urljar;
    }

    public function setUrljar(string $urljar): self
    {
        $this->urljar = $urljar;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->Brand;
    }

    public function setBrand(string $Brand): self
    {
        $this->Brand = $Brand;

        return $this;
    }
}
