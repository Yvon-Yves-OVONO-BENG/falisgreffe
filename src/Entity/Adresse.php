<?php

namespace App\Entity;

use App\Repository\AdresseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdresseRepository::class)
 */
class Adresse
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $complementAdresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numeroRue;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $voie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="adresses")
     */
    private $pays;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $accepteRecevoirInformations;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fixe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $partable;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fax;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="adresse")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function setComplementAdresse(?string $complementAdresse): self
    {
        $this->complementAdresse = $complementAdresse;

        return $this;
    }

    public function getNumeroRue(): ?string
    {
        return $this->numeroRue;
    }

    public function setNumeroRue(?string $numeroRue): self
    {
        $this->numeroRue = $numeroRue;

        return $this;
    }

    public function getVoie(): ?string
    {
        return $this->voie;
    }

    public function setVoie(?string $voie): self
    {
        $this->voie = $voie;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(?string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getAccepteRecevoirInformations(): ?bool
    {
        return $this->accepteRecevoirInformations;
    }

    public function setAccepteRecevoirInformations(?bool $accepteRecevoirInformations): self
    {
        $this->accepteRecevoirInformations = $accepteRecevoirInformations;

        return $this;
    }

    public function getFixe(): ?string
    {
        return $this->fixe;
    }

    public function setFixe(?string $fixe): self
    {
        $this->fixe = $fixe;

        return $this;
    }

    public function getPartable(): ?string
    {
        return $this->partable;
    }

    public function setPartable(?string $partable): self
    {
        $this->partable = $partable;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setAdresse($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getAdresse() === $this) {
                $user->setAdresse(null);
            }
        }

        return $this;
    }

}
