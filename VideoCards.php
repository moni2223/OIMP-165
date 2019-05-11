<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VideoCardsRepository")
 */
class VideoCards
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
    private $name;

    /**
     * @ORM\Column(type="string", length=400)
     */
    private $Type;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $Chipset;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Cooling;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Coolers;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $GPUspeed;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $GPUmemory;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $Memory;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $Output;

    /**
     * @ORM\Column(type="string", length=2000)
     */
    private $Urldes;

    /**
     * @ORM\Column(type="string", length=2000)
     */
    private $Urlardes;

    /**
     * @ORM\Column(type="string", length=2000)
     */
    private $urlemag;

    /**
     * @ORM\Column(type="string", length=2000)
     */
    private $urljar;

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
     * @ORM\Column(type="string", length=2000)
     */
    private $imageurl;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $Brand;

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

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getChipset(): ?string
    {
        return $this->Chipset;
    }

    public function setChipset(string $Chipset): self
    {
        $this->Chipset = $Chipset;

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

    public function getCoolers(): ?string
    {
        return $this->Coolers;
    }

    public function setCoolers(string $Coolers): self
    {
        $this->Coolers = $Coolers;

        return $this;
    }

    public function getGPUspeed(): ?string
    {
        return $this->GPUspeed;
    }

    public function setGPUspeed(string $GPUspeed): self
    {
        $this->GPUspeed = $GPUspeed;

        return $this;
    }

    public function getGPUmemory(): ?string
    {
        return $this->GPUmemory;
    }

    public function setGPUmemory(string $GPUmemory): self
    {
        $this->GPUmemory = $GPUmemory;

        return $this;
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

    public function getOutput(): ?string
    {
        return $this->Output;
    }

    public function setOutput(string $Output): self
    {
        $this->Output = $Output;

        return $this;
    }

    public function getUrldes(): ?string
    {
        return $this->Urldes;
    }

    public function setUrldes(string $Urldes): self
    {
        $this->Urldes = $Urldes;

        return $this;
    }

    public function getUrlardes(): ?string
    {
        return $this->Urlardes;
    }

    public function setUrlardes(string $Urlardes): self
    {
        $this->Urlardes = $Urlardes;

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

    public function getImageurl(): ?string
    {
        return $this->imageurl;
    }

    public function setImageurl(string $imageurl): self
    {
        $this->imageurl = $imageurl;

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
