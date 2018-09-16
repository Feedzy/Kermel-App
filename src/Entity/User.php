<?php

namespace App\Entity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"Password", "Telephone", "Email"}, message="Les information que vous avez fournit sont déja utiliser")
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
     * @ORM\Column(type="string", length=100)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Nom;

    /**
     * @ORM\Column(type="text")
     */
    private $Adresse;

    /**
     * @ORM\Column(type="string")
     * @Assert\Email();
     */
    private $Email;

    /**
     * @ORM\Column(type="integer")
     */
    private $Telephone;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $Code_Postal;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\Length(max="20", maxMessage="Votre username ne doit pas dépasser 20 caracteres ")
     */
    private $Username;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\Length(max="20", maxMessage="Votre mot de passe ne doit pas dépasser 20 caracteres ")
     */
    private $Password;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $salt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getTelephone()
    {
        return $this->Telephone;
    }

    public function setTelephonr($Telephonr): self
    {
        $this->Telephone = $Telephonr;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodePostal()
    {
        return $this->Code_Postal;
    }

    /**
     * @param mixed $Code_Postal
     */
    public function setCodePostal($Code_Postal): void
    {
        $this->Code_Postal = $Code_Postal;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function getPassword()
    {
        return $this->Password;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function getUsername()
    {
        return $this->Username;
    }

    public function eraseCredentials()
    {
    }


}
