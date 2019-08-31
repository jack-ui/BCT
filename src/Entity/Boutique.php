<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile; //$_FILE



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
     * 
     * Le formulaire effectue seul cette vérification
     *
     */
    private $livraison;




    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * 
     * Le formulaire effectue seul cette vérification
     *
     */
    private $paiement;


    /**
     * @var string|null
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    private $photo = 'default.jpg'; //il faut mettre une photo par défaut pour harmoniser niveau design ! il faut aussi définir les tailles de la photo, format, etc ! 

    private $file;
    // On ne mappe pas cette propriété car elle n'existe pas dans la BDD. Elle va juste servir à récupérer les octets qui constitue l'image. 

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


    public function setPaiement($paiement)
    {
        $this->paiement = $paiement;
        return $this;
    }

    public function getPaiement()
    {
        return $this->paiement;
    }



    public function setLivraison($livraison)
    {
        $this->livraison = $livraison;
        return $this;
    }

    public function getLivraison()
    {
        return $this->livraison;
    }




    public function setNomBoutique($nomBoutique)
    {
        $this->nomBoutique = $nomBoutique;
        return $this;
    }

    public function getNomBoutique()
    {
        return $this->nomBoutique;
    }


    public function setSiret($siret)
    {
        $this->siret = $siret;
        return $this;
    }

    public function getSiret()
    {
        return $this->siret;
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


    //------------------------------------- FONCTION POUR LA PHOTO -------------------------

    public function setFile(UploadedFile $file): self
    {
        $this->file = $file;
        return $this;
    }

    public function getFile()
    {
        return $this->file;
    }


    //2 objectif : 
    // permettre l'enregistrement de la photo dans la BDD (après qu'elle soit renommée)
    // Enregistrer la photo sur le serveur /public/photo

    public function uploadFile()
    {
        // On récupère le nom de la photo
        // rouge.jpg
        $nom = $this->file->getClientOriginalName(); //$_FILE['file']['name']
        $new_nom = $this->renamePhoto($nom);
        $this->photo = $new_nom; // /!\ sera enregistré en BDD

        //----- 
        $this->file->move($this->dirPhoto(), $new_nom);
        // déplace la photo depuis son emplacement temporaire jusqu'à son emplacement définitif (chemin + nom)
    }

    // renomme la photo de manière unique
    public function renamePhoto($name)
    {
        return 'photo_' . time() . '_' . rand(1, 99999) . '_' . $name;
        //photo_1550000000_87534_rouge.jpg
    }

    // Nous retourne le chemin du dossier photo
    public function dirPhoto()
    {
        return __DIR__ . '/../../public/photo/';
    }

    // Supprimer un fichier photo 
    public function removePhoto()
    {
        $file = $this->dirPhoto() . $this->getPhoto();
        if (file_exists($file) && $this->getPhoto() != 'default.jpg') {
            unlink($file);
        }
    }
    //------------------------------------- /FONCTION POUR LA PHOTO ------------------------------------------------
}
