<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PanierRepository")
 */
class Panier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Quantite;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Produits")
     */
    private $Produits;

    /**
     * @ORM\Column(type="float")
     */
    private $Prix_unitaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->Quantite;
    }

    public function setQuantite(int $Quantite): self
    {
        $this->Quantite = $Quantite;

        return $this;
    }

    public function getProduits(): ?string
    {
        return $this->Produits;
    }

    public function setProduits(string $Produits): self
    {
        $this->Produits = $Produits;

        return $this;
    }

    public function getPrixUnitaire(): ?float
    {
        return $this->Prix_unitaire;
    }

    public function setPrixUnitaire(float $Prix_unitaire): self
    {
        $this->Prix_unitaire = $Prix_unitaire;

        return $this;
    }
}
