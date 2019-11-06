<?php

namespace App\Entity;

use DateTimeInterface;
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
     * @ORM\Column(type="integer", nullable=false)
     */
    private $refill;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Truck", inversedBy="adBlueRefills", cascade={"persist"})
     */
    private $event;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    private $refillDate;

    /**
     * @ORM\Column(type="string", nullable=false, length=3)
     */
    private $refillCountry;


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

    public function getRefillDate(): ?DateTimeInterface
    {
        return $this->refillDate;
    }

    public function setRefillDate(DateTimeInterface $refillDate): self
    {
        $this->refillDate = $refillDate;

        return $this;
    }

    public function getRefillCountry(): ?string
    {
        return $this->refillCountry;
    }

    public function setRefillCountry(string $refillCountry): self
    {
        $this->refillCountry = $refillCountry;

        return $this;
    }
}
