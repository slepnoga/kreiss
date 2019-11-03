<?php

namespace App\Entity;

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
     * @ORM\Column(type="integer")
     */
    private $truckrefill;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Truck", inversedBy="fuelRefills")
     */
    private $event;


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
}
