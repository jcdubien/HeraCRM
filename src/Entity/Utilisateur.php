<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraint as Assert;



/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 * @UniqueEntity(
 *     fields = {"email"},
 *     message = "L'email que vous avez indiqué est déjà utilisé"
 * )
 */
class Utilisateur implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motdepasse;

    /**
     * @var string
     *
     *
     *
     */
    public $checkmotdepasse;



    /**
     * @ORM\Column(type="boolean")
     *
     */
    private $godmode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    private $password;

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

    public function getMotdepasse(): ?string
    {
        return $this->motdepasse;
    }

    public function getPassword()
    {
        $this->password=$this->motdepasse;
        return $this->password;
    }

    public function setMotdepasse(string $motdepasse): self
    {
        $this->motdepasse = $motdepasse;

        return $this;
    }

    public function getGodmode(): ?bool
    {
        return $this->godmode;
    }

    public function setGodmode(bool $godmode): self
    {
        $this->godmode = $godmode;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function eraseCredentials() {}
    public function getSalt() {}
    public function getRoles() {
        return ['ROLE_USER'];
}
}
