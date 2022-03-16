<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Customer
 */
#[ApiResource(
    // collectionOperations: ['GET', 'POST'],
    itemOperations: ['GET', 'PUT', 'DELETE'],
    normalizationContext: [
        'groups' => [
            'read:customer',
            'write:customer'
        ]
    ],
)]
#[ORM\Table(name: 'customer')]
#[ORM\Entity(repositoryClass: CustomerRepository::class)]
class Customer implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'cust_id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[Groups(['read:customer', 'write:customer'])]
    private $custId;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'cust_firstname', type: 'string', length: 255, nullable: true)]
    #[Groups(['read:customer', 'write:customer'])]
    private $custFirstname;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'cust_lastname', type: 'string', length: 255, nullable: true)]
    #[Groups(['read:customer', 'write:customer'])]
    private $custLastname;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'cust_restaurant_name', type: 'string', length: 100, nullable: true)]
    #[Groups(['read:customer', 'write:customer'])]
    private $custRestaurantName;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'cust_email', type: 'string', length: 2048, nullable: true, unique: true)]
    #[Groups(['read:customer', 'write:customer'])]
    private $email;


    /**
     * @var string The hashed password
     */
    #[ORM\Column(name: 'cust_password', type: 'string', length: 255)]
    private $password;

    #[ORM\Column(name: 'cust_role', type: 'json')]
    #[Groups(['read:customer', 'write:customer'])]
    private $roles = [];

    /**
     * @var bool|null
     */
    #[ORM\Column(name: 'cust_has_valid', type: 'boolean', nullable: true)]
    #[Groups(['read:customer', 'write:customer'])]
    private $custHasValid;

    /**
     * @var bool|null
     */
    #[ORM\Column(name: 'cust_active', type: 'boolean', nullable: true)]
    #[Groups(['read:customer', 'write:customer'])]
    private $custActive;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'cust_date_add', type: 'datetime', nullable: true)]
    #[Groups(['read:customer', 'write:customer'])]
    private $custDateAdd;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'cust_date_upd', type: 'datetime', nullable: true)]
    #[Groups(['read:customer', 'write:customer'])]
    private $custDateUpd;

    public function getCustId(): ?int
    {
        return $this->custId;
    }

    public function getCustFirstname(): ?string
    {
        return $this->custFirstname;
    }

    public function setCustFirstname(?string $custFirstname): self
    {
        $this->custFirstname = $custFirstname;

        return $this;
    }

    public function getCustLastname(): ?string
    {
        return $this->custLastname;
    }

    public function setCustLastname(?string $custLastname): self
    {
        $this->custLastname = $custLastname;

        return $this;
    }

    public function getCustRestaurantName(): ?string
    {
        return $this->custRestaurantName;
    }

    public function setCustRestaurantName(?string $custRestaurantName): self
    {
        $this->custRestaurantName = $custRestaurantName;

        return $this;
    }


    public function getCustHasValid(): ?bool
    {
        return $this->custHasValid;
    }

    public function setCustHasValid(?bool $custHasValid): self
    {
        $this->custHasValid = $custHasValid;

        return $this;
    }

    public function getCustActive(): ?bool
    {
        return $this->custActive;
    }

    public function setCustActive(?bool $custActive): self
    {
        $this->custActive = $custActive;

        return $this;
    }

    public function getCustDateAdd(): ?\DateTimeInterface
    {
        return $this->custDateAdd;
    }

    public function setCustDateAdd(?\DateTimeInterface $custDateAdd): self
    {
        $this->custDateAdd = $custDateAdd;

        return $this;
    }

    public function getCustDateUpd(): ?\DateTimeInterface
    {
        return $this->custDateUpd;
    }

    public function setCustDateUpd(?\DateTimeInterface $custDateUpd): self
    {
        $this->custDateUpd = $custDateUpd;

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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
