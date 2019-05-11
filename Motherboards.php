<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MotherboardsRepository")
 */
class Motherboards
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
    private $Socket;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Cpusocket;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Typememory;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Integrated;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DVI;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $HDMI;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DisplayPort;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $price;

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
    private $urlimage;

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

    public function getSocket(): ?string
    {
        return $this->Socket;
    }

    public function setSocket(string $Socket): self
    {
        $this->Socket = $Socket;

        return $this;
    }

    public function getCpusocket(): ?string
    {
        return $this->Cpusocket;
    }

    public function setCpusocket(string $Cpusocket): self
    {
        $this->Cpusocket = $Cpusocket;

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

    public function getTypememory(): ?string
    {
        return $this->Typememory;
    }

    public function setTypememory(string $Typememory): self
    {
        $this->Typememory = $Typememory;

        return $this;
    }

    public function getIntegrated(): ?string
    {
        return $this->Integrated;
    }

    public function setIntegrated(string $Integrated): self
    {
        $this->Integrated = $Integrated;

        return $this;
    }

    public function getDVI(): ?string
    {
        return $this->DVI;
    }

    public function setDVI(string $DVI): self
    {
        $this->DVI = $DVI;

        return $this;
    }

    public function getHDMI(): ?string
    {
        return $this->HDMI;
    }

    public function setHDMI(string $HDMI): self
    {
        $this->HDMI = $HDMI;

        return $this;
    }

    public function getDisplayPort(): ?string
    {
        return $this->DisplayPort;
    }

    public function setDisplayPort(string $DisplayPort): self
    {
        $this->DisplayPort = $DisplayPort;

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): self
    {
        $this->price = $price;

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

    public function getUrlimage(): ?string
    {
        return $this->urlimage;
    }

    public function setUrlimage(string $urlimage): self
    {
        $this->urlimage = $urlimage;

        return $this;
    }
}
