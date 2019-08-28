<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface; 

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
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
     * @ORM\Column(type="string", length=30)
	 *
	 *
	 * @Assert\NotBlank(message="Veuillez renseigner un pseudo")
	 * @Assert\Length(
	 *	min=3, 
	 *	max=30,
	 *  minMessage="Veuillez renseigner un pseudo de 3 caractères mini", 
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
     * @ORM\Column(type="string", length=50)
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
	 *	min=3, 
	 *	max=30,
	 *  minMessage="Veuillez renseigner un prénom de 3 caractères mini", 
	 *  maxMessage="Veuillez renseigner un prénom de 30 carctères maxi"
	 * )
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=30)
	 *
	 * @Assert\NotBlank(message="Veuillez renseigner un nom")
	 * @Assert\Length(
	 *	min=3, 
	 *	max=30,
	 *  minMessage="Veuillez renseigner un nom de 3 caractères mini", 
	 *  maxMessage="Veuillez renseigner un nom de 30 carctères maxi"
	 * )
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=1)
	 * @Assert\Choice({"m", "f", "t"})
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
	 * @Assert\Type(type="integer", message="Veuillez renseigner un code postal composé de chiffre.")
     */
    private $codePostal;

    /**
     * @ORM\Column(type="text")
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=17)
	 * @Assert\Regex(
	 *	pattern="/^0[1-68]([-. ]?[0-9]{2}){4}$/",
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
	* @ORM\Column(name="role", type="string", length=20)
	*/
	private $role = 'ROLE_USER';
	
	/**
	* @ORM\Column(name="salt", type="string", length=255, nullable=true)
	*/
	private $salt;
	
	public function setSalt($salt){
		$this -> salt = $salt;
		return $this;
	}
	
	public function getSalt(){
		return $this -> salt;
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
	
}
