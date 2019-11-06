<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FuelRefillRepository")
 */
class FuelRefill
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
    private $truckrefill;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Truck", inversedBy="fuelRefills")
     */
    private $event;

    /**
     * @ORM\Column(type="string", length=3, nullable=false)
     */
    private $country;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    private $date;


    public function getId(): ?int
    {
        return $this->id;
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

    public function getTruckrefill(): ?int
    {
        return $this->truckrefill;
    }

    public function setTruckrefill(int $truckrefill): self
    {
        $this->truckrefill = $truckrefill;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
