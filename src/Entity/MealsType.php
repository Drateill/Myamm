<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MealsTypeRepository")
 */
class MealsType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Meals", mappedBy="mealsType")
     */
    private $meal;

    public function __construct()
    {
        $this->meal = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * @return Collection|Meals[]
     */
    public function getMeal(): Collection
    {
        return $this->meal;
    }

    public function addMeal(Meals $meal): self
    {
        if (!$this->meal->contains($meal)) {
            $this->meal[] = $meal;
            $meal->setMealsType($this);
        }

        return $this;
    }

    public function removeMeal(Meals $meal): self
    {
        if ($this->meal->contains($meal)) {
            $this->meal->removeElement($meal);
            // set the owning side to null (unless already changed)
            if ($meal->getMealsType() === $this) {
                $meal->setMealsType(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->genre;
    }
}
