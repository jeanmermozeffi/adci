<?php

namespace App\Entity;

use App\Repository\AdhesionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AdhesionRepository::class)]
class Adhesion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(type: 'boolean')]
    #[Assert\NotNull]
    private $adhereADCI;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $zone;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $nomEtPrenoms;

    #[ORM\Column(type: 'date')]
    #[Assert\NotNull]
    private $dateDeNaissance;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $lieuDeNaissance;

    #[ORM\Column(type: 'boolean')]
    #[Assert\NotNull]
    private $inscritSurListeElectorale;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $lieuDeVote;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $numeroCarteElecteur;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $lieuDeResidenceActuelle;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $departement;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $region;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $naturePieceIdentite;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $numeroPieceIdentite;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $numeroExtraitActeNaissance;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $profession;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $contactsCellulaires;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Email]
    private $adresseElectronique;

    // Getters et Setters...


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getAdhereADCI(): ?bool
    {
        return $this->adhereADCI;
    }

    public function setAdhereADCI(bool $adhereADCI): self
    {
        $this->adhereADCI = $adhereADCI;

        return $this;
    }

    public function getZone(): ?string
    {
        return $this->zone;
    }

    public function setZone(string $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    public function getNomEtPrenoms(): ?string
    {
        return $this->nomEtPrenoms;
    }

    public function setNomEtPrenoms(string $nomEtPrenoms): self
    {
        $this->nomEtPrenoms = $nomEtPrenoms;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->dateDeNaissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $dateDeNaissance): self
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }

    public function getLieuDeNaissance(): ?string
    {
        return $this->lieuDeNaissance;
    }

    public function setLieuDeNaissance(string $lieuDeNaissance): self
    {
        $this->lieuDeNaissance = $lieuDeNaissance;

        return $this;
    }

    public function getInscritSurListeElectorale(): ?bool
    {
        return $this->inscritSurListeElectorale;
    }

    public function setInscritSurListeElectorale(bool $inscritSurListeElectorale): self
    {
        $this->inscritSurListeElectorale = $inscritSurListeElectorale;

        return $this;
    }

    public function getLieuDeVote(): ?string
    {
        return $this->lieuDeVote;
    }

    public function setLieuDeVote(?string $lieuDeVote): self
    {
        $this->lieuDeVote = $lieuDeVote;

        return $this;
    }

    public function getNumeroCarteElecteur(): ?string
    {
        return $this->numeroCarteElecteur;
    }

    public function setNumeroCarteElecteur(?string $numeroCarteElecteur): self
    {
        $this->numeroCarteElecteur = $numeroCarteElecteur;

        return $this;
    }

    public function getLieuDeResidenceActuelle(): ?string
    {
        return $this->lieuDeResidenceActuelle;
    }

    public function setLieuDeResidenceActuelle(string $lieuDeResidenceActuelle): self
    {
        $this->lieuDeResidenceActuelle = $lieuDeResidenceActuelle;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(string $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getNaturePieceIdentite(): ?string
    {
        return $this->naturePieceIdentite;
    }

    public function setNaturePieceIdentite(string $naturePieceIdentite): self
    {
        $this->naturePieceIdentite = $naturePieceIdentite;

        return $this;
    }

    public function getNumeroPieceIdentite(): ?string
    {
        return $this->numeroPieceIdentite;
    }

    public function setNumeroPieceIdentite(?string $numeroPieceIdentite): self
    {
        $this->numeroPieceIdentite = $numeroPieceIdentite;

        return $this;
    }

    public function getNumeroExtraitActeNaissance(): ?string
    {
        return $this->numeroExtraitActeNaissance;
    }

    public function setNumeroExtraitActeNaissance(?string $numeroExtraitActeNaissance): self
    {
        $this->numeroExtraitActeNaissance = $numeroExtraitActeNaissance;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function getContactsCellulaires(): ?string
    {
        return $this->contactsCellulaires;
    }

    public function setContactsCellulaires(string $contactsCellulaires): self
    {
        $this->contactsCellulaires = $contactsCellulaires;

        return $this;
    }

    public function getAdresseElectronique(): ?string
    {
        return $this->adresseElectronique;
    }

    public function setAdresseElectronique(string $adresseElectronique): self
    {
        $this->adresseElectronique = $adresseElectronique;

        return $this;
    }
}
