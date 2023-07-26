<?php

namespace App\Entity;

use App\Repository\AdLenderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdLenderRepository::class)]
class AdLender
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $adTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $adDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $adCategory = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adPicture = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdDate = null;

    #[ORM\Column(nullable: true)]
    private ?bool $adStatus = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\ManyToOne(inversedBy: 'userAd', fetch:'EAGER')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'adLender', targetEntity: OrderBorrower::class, orphanRemoval: true)]
    private Collection $adWithOrder;

    public function __construct()
    {
        $this->adWithOrder = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdTitle(): ?string
    {
        return $this->adTitle;
    }

    public function setAdTitle(string $adTitle): static
    {
        $this->adTitle = $adTitle;

        return $this;
    }

    public function getAdDescription(): ?string
    {
        return $this->adDescription;
    }

    public function setAdDescription(string $adDescription): static
    {
        $this->adDescription = $adDescription;

        return $this;
    }

    public function getAdCategory(): ?string
    {
        return $this->adCategory;
    }

    public function setAdCategory(string $adCategory): static
    {
        $this->adCategory = $adCategory;

        return $this;
    }

    public function getAdPicture(): ?string
    {
        return $this->adPicture;
    }

    public function setAdPicture(?string $adPicture): static
    {
        $this->adPicture = $adPicture;

        return $this;
    }

    public function getCreatedDate(): ?\DateTimeInterface
    {
        return $this->createdDate;
    }

    public function setCreatedDate(\DateTimeInterface $createdDate): static
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    public function isAdStatus(): ?bool
    {
        return $this->adStatus;
    }

    public function setAdStatus(?bool $adStatus): static
    {
        $this->adStatus = $adStatus;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, OrderBorrower>
     */
    public function getAdWithOrder(): Collection
    {
        return $this->adWithOrder;
    }

    public function addAdWithOrder(OrderBorrower $adWithOrder): static
    {
        if (!$this->adWithOrder->contains($adWithOrder)) {
            $this->adWithOrder->add($adWithOrder);
            $adWithOrder->setAdLender($this);
        }

        return $this;
    }

    public function removeAdWithOrder(OrderBorrower $adWithOrder): static
    {
        if ($this->adWithOrder->removeElement($adWithOrder)) {
            // set the owning side to null (unless already changed)
            if ($adWithOrder->getAdLender() === $this) {
                $adWithOrder->setAdLender(null);
            }
        }

        return $this;
    }
}
