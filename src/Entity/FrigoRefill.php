<?php

namespace App\Entity;

use DateTimeInterface;
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
     * @ORM\Column(type="date", nullable=false)
     */
    private $date;

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
