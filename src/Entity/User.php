<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{

    public function __construct()
    {
        $this->commandes = new ArrayCollection;
    }


    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, nullable=false)
	 *
	 *
	 * @Assert\NotBlank(message="Veuillez renseigner un pseudo")
	 * @Assert\Length(
	 *	min=2,
	 *	max=30,
	 *  minMessage="Veuillez renseigner un pseudo de 2 caractères mini",
	 *  maxMessage="Veuillez renseigner un pseudo de 30 carctères maxi"
	 * )
	 *
     */
    private $username;




    /**
     * @ORM\Column(type="string", length=255, nullable=false)
	 * @Assert\Regex(
	 *   pattern="/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/",
	 *	 message="Veuillez saisir un mot de passe composé d'une minuscule, d'une majuscule, d'un chiffre (8 caractères mini)"
	 * )
	 * @Assert\NotBlank(message="Veuillez renseigner un mot de passe")
     */
    private $password;



    /**
     * @ORM\Column(type="string", length=100, nullable=false)
	 *
	 * @Assert\NotBlank(message="Veuillez renseigner un email")
	 * @Assert\Email(message="Veuillez renseigner un email valide")
	 *
     */
    private $email;


    /**
     * @ORM\Column(type="string", length=30)
	 *
	 * @Assert\NotBlank(message="Veuillez renseigner un prénom")
	 * @Assert\Length(
	 *	min=2,
	 *	max=30,
	 *  minMessage="Veuillez renseigner un prénom de 2 caractères mini",
	 *  maxMessage="Veuillez renseigner un prénom de 30 carctères maxi"
	 * )
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=50)
	 *
	 * @Assert\NotBlank(message="Veuillez renseigner un nom")
	 * @Assert\Length(
	 *	min=2,
	 *	max=50,
	 *  minMessage="Veuillez renseigner un nom de 2 caractères mini",
	 *  maxMessage="Veuillez renseigner un nom de 50 carctères maxi"
	 * )
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=1)
	 * @Assert\Choice({"m", "f"})
	 * Le formulaire effectue seul cette vérification
	 *
     */
    private $sexe;


    /**
     * @ORM\Column(type="string", length=50)
	 * @Assert\NotBlank(message="Veuillez renseigner une ville")
	 * @Assert\Length(
	 *	min=3,
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
     * @ORM\Column(type="string")
     * @Assert\Choice({"75", "77", "78", "91", "92", "93", "94", "95"}, message="Veuillez choisir votre département")
     */
    private $departement;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Choice({"ARA", "BFC", "BRE", "CVL", "COR", "GES", "HDF", "IDF", "NOR", "NAQ", "OCC", "PDL", "PAC"}, message="Veuillez choisir votre région")
     */
    private $region;

    /**
     * @ORM\Column(type="string", length=25)
	 * @Assert\Regex(
	 *	pattern="/^0[1-9]([-. ]?[0-9]{2}){4}$/",
	 *	message="Mauvais numero de téléphone"
	 *)
     */
    private $telephone;


    /**
     * @ORM\Column(type="date")
	 * @Assert\Date()
     */
    private $dateDeNaissance;



	/**
	* @ORM\Column(name="salt", type="string", length=255, nullable=true)
	*/
    private $salt;

    /**
     * @ORM\Column(type="string", length=1)
	 * @Assert\Choice({"0", "1"})
	 * Le formulaire effectue seul cette vérification
	 *
     */
    private $statut;


        /**
     *
     * Un user peut avoir 0 commande min et N commande max => ManyToOne
     *
     * @ORM\OneToMany(targetEntity="Commande", mappedBy="user_id")
     *                                table       Clé étrangère
     *
     *
     * Contient toutes les commandes du membre (Array composé d'objets commandes)
     */
    private $commandes;


    /**
     *
     * @OneToOne(targetEntity="Boutique")
     * @JoinColumn(name="boutiqueId", referencedColumnName="id")
     */
    private $boutiqueId;

    //twig : boutiqueId ===> PHP :  getBoutique_Id()
    //réalité : getBoutiqueId()

    /**
	* @ORM\Column(name="role", type="string", length=20)
	*/
    private $role = 'ROLE_USER';


    public function getBoutiqueId()
    {
        return $this->boutiqueId;
    }

    public function setBoutiqueId($boutiqueId): self
    {
        $this->boutiqueId = $boutiqueId;

        return $this;
    }


    public function getCommandes()
    {
        return $this->commandes;
    }

    public function setCommandes($commandes)
    {
        $this->commandes = $commandes;
        return $this;
    }




    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }



	public function setSalt($salt){
		$this -> salt = $salt;
		return $this;
	}

	public function getSalt(){
		return $this -> salt;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
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

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

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

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(string $departement): self
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

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


    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->dateDeNaissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $dateDeNaissance): self
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }


    public function setRole($role){
		$this -> role = $role;
		return $this;
	}

	public function getRole(){
		return $this -> role;
	}


    public function getRoles(){
		return [$this -> role];
    }


    public function eraseCredentials(){}
}
