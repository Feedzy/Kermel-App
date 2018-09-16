<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $User;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Produits")
     */
    private $Produits;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\DateTime()
     */
    private $Date;


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->User;
    }

    /**
     * @param mixed $User
     */
    public function setUser(\App\Entity\User $User): void
    {
        $this->User = $User;
    }

    /**
     * @return mixed
     */
    public function getProduits()
    {
        return $this->Produits;
    }

    /**
     * @param mixed $Produits
     */
    public function setProduits($Produits): void
    {
        $this->Produits = $Produits;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * @param mixed $Date
     */
    public function setDate($Date): void
    {
        $this->Date = $Date;
    }


}
