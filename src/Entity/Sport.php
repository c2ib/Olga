<?php

namespace App\Entity;

use App\Repository\SportRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SportRepository::class)
 */
class Sport
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Ligue::class, mappedBy="sport")
     */
    private $Ligue;

    public function __construct()
    {
        $this->Ligue = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Ligue[]
     */
    public function getLigue(): Collection
    {
        return $this->Ligue;
    }

    public function addLigue(Ligue $ligue): self
    {
        if (!$this->Ligue->contains($ligue)) {
            $this->Ligue[] = $ligue;
            $ligue->setSport($this);
        }

        return $this;
    }

    public function removeLigue(Ligue $ligue): self
    {
        if ($this->Ligue->removeElement($ligue)) {
            // set the owning side to null (unless already changed)
            if ($ligue->getSport() === $this) {
                $ligue->setSport(null);
            }
        }

        return $this;
    }
}
