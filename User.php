<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=400)
     */
    private $first;

    /**
     * @ORM\Column(type="string", length=400)
     */
    private $last;

    /**
     * @ORM\Column(type="string", length=400)
     */
    private $Config1;

    /**
     * @ORM\Column(type="string", length=400)
     */
    private $Config2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Config3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Config4;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Config5;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirst(): ?string
    {
        return $this->first;
    }

    public function setFirst(string $first): self
    {
        $this->first = $first;

        return $this;
    }

    public function getLast(): ?string
    {
        return $this->last;
    }

    public function setLast(string $last): self
    {
        $this->last = $last;

        return $this;
    }

    public function getConfig1(): ?string
    {
        return $this->Config1;
    }

    public function setConfig1(string $Config1): self
    {
        $this->Config1 = $Config1;

        return $this;
    }

    public function getConfig2(): ?string
    {
        return $this->Config2;
    }

    public function setConfig2(string $Config2): self
    {
        $this->Config2 = $Config2;

        return $this;
    }

    public function getConfig3(): ?string
    {
        return $this->Config3;
    }

    public function setConfig3(string $Config3): self
    {
        $this->Config3 = $Config3;

        return $this;
    }

    public function getConfig4(): ?string
    {
        return $this->Config4;
    }

    public function setConfig4(string $Config4): self
    {
        $this->Config4 = $Config4;

        return $this;
    }

    public function getConfig5(): ?string
    {
        return $this->Config5;
    }

    public function setConfig5(string $Config5): self
    {
        $this->Config5 = $Config5;

        return $this;
    }
}
