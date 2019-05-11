<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RAMRepository")
 */
class RAM
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $Memory;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $Memoryfordb;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $pack;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Type;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $Speed;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Multi;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $CAS;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Cooling;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Voltage;

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

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMemory(): ?string
    {
        return $this->Memory;
    }

    public function setMemory(string $Memory): self
    {
        $this->Memory = $Memory;

        return $this;
    }

    public function getMemoryfordb(): ?string
    {
        return $this->Memoryfordb;
    }

    public function setMemoryfordb(string $Memoryfordb): self
    {
        $this->Memoryfordb = $Memoryfordb;

        return $this;
    }

    public function getPack(): ?string
    {
        return $this->pack;
    }

    public function setPack(string $pack): self
    {
        $this->pack = $pack;

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

    public function getSpeed(): ?string
    {
        return $this->Speed;
    }

    public function setSpeed(string $Speed): self
    {
        $this->Speed = $Speed;

        return $this;
    }

    public function getMulti(): ?string
    {
        return $this->Multi;
    }

    public function setMulti(string $Multi): self
    {
        $this->Multi = $Multi;

        return $this;
    }

    public function getCAS(): ?string
    {
        return $this->CAS;
    }

    public function setCAS(string $CAS): self
    {
        $this->CAS = $CAS;

        return $this;
    }

    public function getCooling(): ?string
    {
        return $this->Cooling;
    }

    public function setCooling(string $Cooling): self
    {
        $this->Cooling = $Cooling;

        return $this;
    }

    public function getVoltage(): ?string
    {
        return $this->Voltage;
    }

    public function setVoltage(string $Voltage): self
    {
        $this->Voltage = $Voltage;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
