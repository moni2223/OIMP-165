<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HardDriveRepository")
 */
class HardDrive
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
    private $Name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Capacity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Speed;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $Cache;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Maxspeed;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $Laptop;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Interface;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pricedew;

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
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getCapacity(): ?string
    {
        return $this->Capacity;
    }

    public function setCapacity(string $Capacity): self
    {
        $this->Capacity = $Capacity;

        return $this;
    }

    public function getSpeed(): ?string
    {
        return $this->Speed;
    }

    public function setSpeed(string $Speed): self
    {
        $this->Speed = $Speed;

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

    public function getMaxspeed(): ?string
    {
        return $this->Maxspeed;
    }

    public function setMaxspeed(string $Maxspeed): self
    {
        $this->Maxspeed = $Maxspeed;

        return $this;
    }

    public function getLaptop(): ?string
    {
        return $this->Laptop;
    }

    public function setLaptop(string $Laptop): self
    {
        $this->Laptop = $Laptop;

        return $this;
    }

    public function getInterface(): ?string
    {
        return $this->Interface;
    }

    public function setInterface(string $Interface): self
    {
        $this->Interface = $Interface;

        return $this;
    }

    public function getPricedew(): ?string
    {
        return $this->pricedew;
    }

    public function setPricedew(string $pricedew): self
    {
        $this->pricedew = $pricedew;

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
