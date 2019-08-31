<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use phpDocumentor\Reflection\Types\Boolean;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $categorie;

    /**
     * @ORM\Column(type="boolean")
     */
    private $uniteMesure;

    /**
     * @ORM\Column(type="float")
     */
    private $stock;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $saisonnalite;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $photo;


        /**
     * 
     * Chaque produit appartient à une et un seule boutique
     * 
     * 
     * @ORM\ManyToOne(targetEntity="Boutique", inversedBy="produits")
     * @ORM\JoinColumn(name="boutique_id", referencedColumnName="id")
     *                 clé étrangère         clé primaire
     * 
     */
    private $boutique_id;

    public function getBoutiqueId(): ?int
    {
        return $this->boutique_id;
    }

    public function setBoutiqueId(int $boutique_id): self
    {
        $this->boutique_id = $boutique_id;

        return $this;
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

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getUniteMesure(): ?boolean
    {
        return $this->uniteMesure;
    }

    public function setUniteMesure(boolean $uniteMesure): self
    {
        $this->uniteMesure = $uniteMesure;

        return $this;
    }

    public function getStock(): ?float
    {
        return $this->stock;
    }

    public function setStock(float $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getSaisonnalite(): ?string
    {
        return $this->saisonnalite;
    }

    public function setSaisonnalite(string $saisonnalite): self
    {
        $this->saisonnalite = $saisonnalite;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
