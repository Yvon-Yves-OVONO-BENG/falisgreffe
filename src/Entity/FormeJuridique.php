<?php

namespace App\Entity;

use App\Repository\FormeJuridiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormeJuridiqueRepository::class)
 */
class FormeJuridique
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
    private $formeJuridique;

    /**
     * @ORM\Column(type="boolean")
     */
    private $societeConstitueAssocieUnique;

    /**
     * @ORM\Column(type="boolean")
     */
    private $personneMoraleConstitueSansActivite;

    /**
     * @ORM\OneToMany(targetEntity=Societe::class, mappedBy="formeJuridique")
     */
    private $societes;

    public function __construct()
    {
        $this->societes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormeJuridique(): ?string
    {
        return $this->formeJuridique;
    }

    public function setFormeJuridique(string $formeJuridique): self
    {
        $this->formeJuridique = $formeJuridique;

        return $this;
    }

    public function getSocieteConstitueAssocieUnique(): ?bool
    {
        return $this->societeConstitueAssocieUnique;
    }

    public function setSocieteConstitueAssocieUnique(bool $societeConstitueAssocieUnique): self
    {
        $this->societeConstitueAssocieUnique = $societeConstitueAssocieUnique;

        return $this;
    }

    public function getPersonneMoraleConstitueSansActivite(): ?bool
    {
        return $this->personneMoraleConstitueSansActivite;
    }

    public function setPersonneMoraleConstitueSansActivite(bool $personneMoraleConstitueSansActivite): self
    {
        $this->personneMoraleConstitueSansActivite = $personneMoraleConstitueSansActivite;

        return $this;
    }

    /**
     * @return Collection<int, Societe>
     */
    public function getSocietes(): Collection
    {
        return $this->societes;
    }

    public function addSociete(Societe $societe): self
    {
        if (!$this->societes->contains($societe)) {
            $this->societes[] = $societe;
            $societe->setFormeJuridique($this);
        }

        return $this;
    }

    public function removeSociete(Societe $societe): self
    {
        if ($this->societes->removeElement($societe)) {
            // set the owning side to null (unless already changed)
            if ($societe->getFormeJuridique() === $this) {
                $societe->setFormeJuridique(null);
            }
        }

        return $this;
    }
}
