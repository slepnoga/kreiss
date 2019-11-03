<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RefillFrigoRepository")
 */
class RefillFrigo
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
    private $FillLiters;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Trailer", inversedBy="refillFrigos")
     */
    private $trailer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFillLiters(): ?int
    {
        return $this->FillLiters;
    }

    public function setFillLiters(int $FillLiters): self
    {
        $this->FillLiters = $FillLiters;

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
