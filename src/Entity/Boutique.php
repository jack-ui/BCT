<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile; //$_FILE
use Symfony\Component\Serializer\Serializer;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BoutiqueRepository")
 */
class Boutique implements \Serializable
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
     * @ORM\Column(type="string", length=50)
     *
     *
     */
    private $siret;



    /**
     * @ORM\Column(type="string", length=255)
     *
     *
     */
    private $nomBoutique;


    /**
     * @ORM\Column(type="string", length=255)
     *
     *
     */
    private $description;


    /**
     * @ORM\Column(type="string", length=255)
     *
     *
     */
    private $livraison;




    /**
     * @ORM\Column(type="string", length=255)
     *
     * Le formulaire effectue seul cette vérification
     *
     */
    private $paiement;


        /**
     * @ORM\Column(type="string", length=50)
	 * @Assert\NotBlank(message="Veuillez renseigner une ville")
	 * @Assert\Length(
	 *	min=2,
	 *	max=50,
	 *  minMessage="Veuillez renseigner une ville de 3 caractères mini",
	 *  maxMessage="Veuillez renseigner une ville de 50 carctères maxi"
	 * )
     */
    private $ville;

    /**
     * @ORM\Column(type="integer")
	 * @Assert\Type(type="integer", message="Veuillez renseigner un code postal composé de chiffres.")
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Choice({"75", "77", "78", "91", "92", "93", "94", "95"}, message="Veuillez choisir votre département")
     */
    private $departement;
    

    /**
     * @ORM\Column(type="string", length=255)
     *  @Assert\Choice({"ARA", "BFC", "BRE", "CVL", "COR", "GES", "HDF", "IDF", "NOR", "NAQ", "OCC", "PDL", "PAC"}, message="Veuillez choisir votre région")
     */
    private $region;

    /**
     * @ORM\Column(type="string", length=25)
	 * @Assert\Regex(
	 *	pattern="/^0[1-68]([-. ]?[0-9]{2}){4}$/",
	 *	message="Mauvais numero de téléphone"
	 *)
     */
    private $telephone;

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
     * @JoinColumn(name="userId", referencedColumnName="id")
     */
    private $userId;



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



    
    /**
     * Une boutique peut avoir 0 commandes min et N commandes max => OnetoMany
     * 
     * @ORM\OneToMany(targetEntity="Commande", mappedBy="id")
     *                                table       Clé étrangère
     * 
     * 
     * Contient toutes les commandes du membre (Array composé d'objets commande)
     */
    private $commandes;



    public function getCommandes()
    {
        return $this->commandes;
    }

    public function setCommandes($commandes)
    {
        $this->commandes = $commandes;
        return $this;
    }


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
        return $this->userId;
    }

    public function setUserId($userId): self
    {
        $this->userId = $userId;

        return $this;
    }


    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }


    public function getDepartement(): ?int
    {
        return $this->departement;
    }

    public function setDepartement(int $departement): self
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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

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


    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
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


    //2 objectifs :
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


    public function serialize(){}
    public function unserialize($arg){}  



}
