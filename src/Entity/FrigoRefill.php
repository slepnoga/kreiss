<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FrigoRefillRepository")
 */
class FrigoRefill
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $refill;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Trailer", inversedBy="frigoRefills")
     */
    private $event;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * Frigo consumption - 2 l or 2.3
     */
    private $consumptionrate;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $workhours;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefill(): ?int
    {
        return $this->refill;
    }

    public function setRefill(?int $refill): self
    {
        $this->refill = $refill;

        return $this;
    }

    public function getEvent(): ?Trailer
    {
        return $this->event;
    }

    public function setEvent(?Trailer $event): self
    {
        $this->event = $event;

        return $this;
    }

    public function getConsumptionrate(): ?int
    {
        return $this->consumptionrate;
    }

    public function setConsumptionrate(?int $consumptionrate): self
    {
        $this->consumptionrate = $consumptionrate;

        return $this;
    }

    public function getWorkhours(): ?int
    {
        return $this->workhours;
    }

    public function setWorkhours(?int $workhours): self
    {
        $this->workhours = $workhours;

        return $this;
    }
}
