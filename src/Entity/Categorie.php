<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 */
class Categorie
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
    private $fruit;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $legume;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $viande;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $produitLaitier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFruit(): ?string
    {
        return $this->fruit;
    }

    public function setFruit(string $fruit): self
    {
        $this->fruit = $fruit;

        return $this;
    }

    public function getLegume(): ?string
    {
        return $this->legume;
    }

    public function setLegume(string $legume): self
    {
        $this->legume = $legume;

        return $this;
    }

    public function getViande(): ?string
    {
        return $this->viande;
    }

    public function setViande(string $viande): self
    {
        $this->viande = $viande;

        return $this;
    }

    public function getProduitLaitier(): ?string
    {
        return $this->produitLaitier;
    }

    public function setProduitLaitier(string $produitLaitier): self
    {
        $this->produitLaitier = $produitLaitier;

        return $this;
    }
}
