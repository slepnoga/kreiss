<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TruckRepository")
 */
class Truck
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=false, unique=true)
     *
     */
    private $licensenumber;

    /**
     * @ORM\Column(type="integer", nullable=false)
     *
     */
    private $fueltanksize;

    


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLicensenumber(): ?string
    {
        return $this->licensenumber;
    }

    public function setLicensenumber(string $licensenumber): self
    {
        $this->licensenumber = $licensenumber;

        return $this;
    }

    public function getFueltanksize(): ?int
    {
        return $this->fueltanksize;
    }

    public function setFueltanksize(int $fueltanksize): self
    {
        $this->fueltanksize = $fueltanksize;

        return $this;
    }
}
