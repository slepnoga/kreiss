<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TripEventsRepository")
 */
class TripEvents
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Truck", inversedBy="tripEvents")
     */
    private $truck;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Trailer", inversedBy="tripEvents")
     */
    private $trailer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTruck(): ?Truck
    {
        return $this->truck;
    }

    public function setTruck(?Truck $truck): self
    {
        $this->truck = $truck;

        return $this;
    }

    public function getTrailer(): ?Trailer
    {
        return $this->trailer;
    }

    public function setTrailer(?Trailer $trailer): self
    {
        $this->trailer = $trailer;

        return $this;
    }
}
