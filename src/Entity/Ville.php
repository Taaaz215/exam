<?php

namespace App\Entity;

use App\Repository\VilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VilleRepository::class)
 */
class Ville
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=ecole::class, mappedBy="ville")
     */
    private $ecole;

    public function __construct()
    {
        $this->ecole = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|ecole[]
     */
    public function getEcole(): Collection
    {
        return $this->ecole;
    }

    public function addEcole(ecole $ecole): self
    {
        if (!$this->ecole->contains($ecole)) {
            $this->ecole[] = $ecole;
            $ecole->setVille($this);
        }

        return $this;
    }

    public function removeEcole(ecole $ecole): self
    {
        if ($this->ecole->removeElement($ecole)) {
            // set the owning side to null (unless already changed)
            if ($ecole->getVille() === $this) {
                $ecole->setVille(null);
            }
        }

        return $this;
    }
}
