<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Ignore;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column]
    private ?int $tel = null;

    #[Ignore]
    #[ORM\OneToMany(mappedBy: 'user', targetEntity: AdLender::class, orphanRemoval: true)]
    private Collection $userAd;
    
    #[Ignore]
    #[ORM\OneToMany(mappedBy: 'user', targetEntity: OrderBorrower::class, orphanRemoval: true)]
    private Collection $userOrder;

    public function __construct()
    {
        $this->userAd = new ArrayCollection();
        $this->userOrder = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * @return Collection<int, AdLender>
     */
    public function getUserAd(): Collection
    {
        return $this->userAd;
    }

    public function addUserAd(AdLender $userAd): static
    {
        if (!$this->userAd->contains($userAd)) {
            $this->userAd->add($userAd);
            $userAd->setUser($this);
        }

        return $this;
    }

    public function removeUserAd(AdLender $userAd): static
    {
        if ($this->userAd->removeElement($userAd)) {
            // set the owning side to null (unless already changed)
            if ($userAd->getUser() === $this) {
                $userAd->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, OrderBorrower>
     */
    public function getUserOrder(): Collection
    {
        return $this->userOrder;
    }

    public function addUserOrder(OrderBorrower $userOrder): static
    {
        if (!$this->userOrder->contains($userOrder)) {
            $this->userOrder->add($userOrder);
            $userOrder->setUser($this);
        }

        return $this;
    }

    public function removeUserOrder(OrderBorrower $userOrder): static
    {
        if ($this->userOrder->removeElement($userOrder)) {
            // set the owning side to null (unless already changed)
            if ($userOrder->getUser() === $this) {
                $userOrder->setUser(null);
            }
        }

        return $this;
    }
}
