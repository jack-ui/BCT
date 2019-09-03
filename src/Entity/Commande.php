<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

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
     * Chaque commande appartient à un et un seul user
     * 
     * @ORM\ManyToOne(targetEntity="User", inversedBy="commandes")
     * @ORM\JoinColumn(name="userId", referencedColumnName="id")
     *                 clé étrangère         clé primaire
     */
    private $userId;


        /**
     * Chaque commande appartient à une et une seule boutique
     * 
     * @ORM\ManyToOne(targetEntity="Boutique", inversedBy="commandes")
     * @ORM\JoinColumn(name="boutiqueId", referencedColumnName="id")
     *                 clé étrangère         clé primaire
     */
    private $boutiqueId;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat;



    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }





    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }


    public function getBoutiqueId(): ?int
    {
        return $this->boutiqueId;
    }

    public function setBoutiqueId(int $boutiqueId): self
    {
        $this->boutiqueId = $boutiqueId;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }


}
