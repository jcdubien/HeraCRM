<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
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
     * @ORM\OneToMany(targetEntity="App\Entity\Commande", mappedBy="category", orphanRemoval=true)
     */
    private $Commande;

    public function __construct()
    {
        $this->Commande = new ArrayCollection();
    }

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

    /**
     * @return Collection|Commande[]
     */
    public function getCommande(): Collection
    {
        return $this->Commande;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->Commande->contains($commande)) {
            $this->Commande[] = $commande;
            $commande->setCategory($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->Commande->contains($commande)) {
            $this->Commande->removeElement($commande);
            // set the owning side to null (unless already changed)
            if ($commande->getCategory() === $this) {
                $commande->setCategory(null);
            }
        }

        return $this;
    }
}
