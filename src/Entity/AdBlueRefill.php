<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdBlueRefillRepository")
 */
class AdBlueRefill
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Truck", inversedBy="adBlueRefills")
     */
    private $event;

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

    public function getEvent(): ?Truck
    {
        return $this->event;
    }

    public function setEvent(?Truck $event): self
    {
        $this->event = $event;

        return $this;
    }
}
