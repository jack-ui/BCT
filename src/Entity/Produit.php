<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use phpDocumentor\Reflection\Types\Boolean;
use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile; //$_FILE



/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
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
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie;


        /**
     * @ORM\Column(type="string", length=255)
     * 
     *
     */
    private $description;


    /**
     * @ORM\Column(type="string", length=255)
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
     * @ORM\Column(type="string", length=255)
     */
    private $saisonnalite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    private $file;
    // On ne mappe pas cette propriété car elle n'existe pas dans la BDD. Elle va juste servir à récupérer les octets qui constitue l'image. 


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
    private $boutiqueId;

    public function getBoutiqueId()
    {
        return $this->boutiqueId;
    }

    public function setBoutiqueId($boutiqueId): self
    {
        $this->boutiqueId = $boutiqueId;

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

    
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getUniteMesure(): ?string
    {
        return $this->uniteMesure;
    }

    public function setUniteMesure(string $uniteMesure): self
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
