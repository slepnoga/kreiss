<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MileageRepository")
 */
class Mileage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Truck", inversedBy="mileages")
     */
    private $event;


    /**
     * @ORM\Column(type="integer")
     *
     */
    private $deepcomp;

    /**
     * @ORM\Column(type="integer")
     */
    private $odometr;

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

    public function getDeepcomp(): ?int
    {
        return $this->deepcomp;
    }

    public function setDeepcomp(int $deepcomp): self
    {
        $this->deepcomp = $deepcomp;

        return $this;
    }

    public function getOdometr(): ?int
    {
        return $this->odometr;
    }

    public function setOdometr(int $odometr): self
    {
        $this->odometr = $odometr;

        return $this;
    }
}
