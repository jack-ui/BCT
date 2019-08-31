<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BoutiqueRepository")
 */
class Boutique
{

    public function __construct()
    {
        $this->produits = new ArrayCollection;
    }


    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @ORM\Column(type="text")
     */
    private $localisation;


    /**
     * @ORM\Column(type="string", length=50, nullable=true)
	 *
	 *
     */
    private $siret;
    


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
	 *
	 *
     */
    private $nomBoutique;



    /**
     * @ORM\Column(type="string", length=20, nullable=true)
	 * @Assert\Choice({"à emporter", "point relais", "domicile"})
	 * Le formulaire effectue seul cette vérification
	 *
     */
    private $livraison;




    /**
     * @ORM\Column(type="string", length=20, nullable=true)
	 * @Assert\Choice({"CB", "paypal", "espèces"})
	 * Le formulaire effectue seul cette vérification
	 *
     */
    private $paiement;


    /**
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    private $photo = 'default.jpg'; //il faut mettre une photo par défaut pour harmoniser niveau design ! il faut aussi définir les tailles de la photo, format, etc ! 



    /**
     * 
     * @OneToOne(targetEntity="User")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user_id;


    /**
     * Une boutique peut avoir 0 produits min et N produit max => OnetoMany
     * 
     * @ORM\OneToMany(targetEntity="Produit", mappedBy="id")
     *                                table       Clé étrangère
     * 
     * 
     * Contient tous les produits du membre (Array composé d'objets produits)
     */
    private $produits;

    public function getProduits()
    {
        return $this->produits;
    }

    public function setProduits($produits)
    {
        $this->produits = $produits;
        return $this;
    }


    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }




    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }


    public function setPaiement($paiement){
		$this -> paiement = $paiement;
		return $this;
	}
	
	public function getPaiement(){
		return $this -> paiement;
	}



    public function setLivraison($livraison){
		$this -> livraison = $livraison;
		return $this;
	}
	
	public function getLivraison(){
		return $this -> livraison;
	}




    public function setNomBoutique($nomBoutique){
		$this -> nomBoutique = $nomBoutique;
		return $this;
	}
	
	public function getNomBoutique(){
		return $this -> nomBoutique;
	}


    public function setSiret($siret){
		$this -> siret = $siret;
		return $this;
	}
	
	public function getSiret(){
		return $this -> siret;
    }
    

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }
}
