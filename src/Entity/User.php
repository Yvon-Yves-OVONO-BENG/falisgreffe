<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
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
     * @ORM\Column(type="boolean")
     */
    private $particulier;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroRCS;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $entreprise;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numTVA;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $renseignerUneReference;

    /**
     * @ORM\Column(type="boolean")
     */
    private $validationChaquePaiement;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $reconnaisAvoirPrisConnaissance;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $conditionGenerale;

    /**
     * @ORM\ManyToOne(targetEntity=SecteurActivite::class, inversedBy="users")
     */
    private $secteurActivite;

    /**
     * @ORM\ManyToOne(targetEntity=Civilite::class, inversedBy="users")
     */
    private $civilite;

    /**
     * @ORM\ManyToOne(targetEntity=Adresse::class, inversedBy="users")
     */
    private $adresse;

    /**
     * @ORM\ManyToOne(targetEntity=Sondage::class, inversedBy="users")
     */
    private $sondage;

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
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getParticulier(): ?bool
    {
        return $this->particulier;
    }

    public function setParticulier(bool $particulier): self
    {
        $this->particulier = $particulier;

        return $this;
    }

    public function getNumeroRCS(): ?string
    {
        return $this->numeroRCS;
    }

    public function setNumeroRCS(string $numeroRCS): self
    {
        $this->numeroRCS = $numeroRCS;

        return $this;
    }

    public function getEntreprise(): ?string
    {
        return $this->entreprise;
    }

    public function setEntreprise(string $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getNumTVA(): ?string
    {
        return $this->numTVA;
    }

    public function setNumTVA(?string $numTVA): self
    {
        $this->numTVA = $numTVA;

        return $this;
    }

    public function getRenseignerUneReference(): ?bool
    {
        return $this->renseignerUneReference;
    }

    public function setRenseignerUneReference(?bool $renseignerUneReference): self
    {
        $this->renseignerUneReference = $renseignerUneReference;

        return $this;
    }

    public function getValidationChaquePaiement(): ?bool
    {
        return $this->validationChaquePaiement;
    }

    public function setValidationChaquePaiement(bool $validationChaquePaiement): self
    {
        $this->validationChaquePaiement = $validationChaquePaiement;

        return $this;
    }

    public function getReconnaisAvoirPrisConnaissance(): ?bool
    {
        return $this->reconnaisAvoirPrisConnaissance;
    }

    public function setReconnaisAvoirPrisConnaissance(?bool $reconnaisAvoirPrisConnaissance): self
    {
        $this->reconnaisAvoirPrisConnaissance = $reconnaisAvoirPrisConnaissance;

        return $this;
    }

    public function getConditionGenerale(): ?bool
    {
        return $this->conditionGenerale;
    }

    public function setConditionGenerale(bool $conditionGenerale): self
    {
        $this->conditionGenerale = $conditionGenerale;

        return $this;
    }

    public function getSecteurActivite(): ?SecteurActivite
    {
        return $this->secteurActivite;
    }

    public function setSecteurActivite(?SecteurActivite $secteurActivite): self
    {
        $this->secteurActivite = $secteurActivite;

        return $this;
    }

    public function getCivilite(): ?Civilite
    {
        return $this->civilite;
    }

    public function setCivilite(?Civilite $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(?Adresse $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getSondage(): ?Sondage
    {
        return $this->sondage;
    }

    public function setSondage(?Sondage $sondage): self
    {
        $this->sondage = $sondage;

        return $this;
    }
}
