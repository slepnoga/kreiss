<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Validator as CSDD;


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
     * @CSDD\TruckNumberPlate()
     */
    private $licensenumber;

    /**
     * @ORM\Column(type="integer", nullable=false)
     *
     */
    private $fueltanksize;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FuelRefill", mappedBy="event")
     */
    private $fuelRefills;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AdBlueRefill", mappedBy="event")
     */
    private $adBlueRefills;

    public function __construct()
    {
        $this->fuelRefills = new ArrayCollection();
        $this->adBlueRefills = new ArrayCollection();
    }

    


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

    /**
     * @return Collection|FuelRefill[]
     */
    public function getFuelRefills(): Collection
    {
        return $this->fuelRefills;
    }

    public function addFuelRefill(FuelRefill $fuelRefill): self
    {
        if (!$this->fuelRefills->contains($fuelRefill)) {
            $this->fuelRefills[] = $fuelRefill;
            $fuelRefill->setEvent($this);
        }

        return $this;
    }

    public function removeFuelRefill(FuelRefill $fuelRefill): self
    {
        if ($this->fuelRefills->contains($fuelRefill)) {
            $this->fuelRefills->removeElement($fuelRefill);
            // set the owning side to null (unless already changed)
            if ($fuelRefill->getEvent() === $this) {
                $fuelRefill->setEvent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AdBlueRefill[]
     */
    public function getAdBlueRefills(): Collection
    {
        return $this->adBlueRefills;
    }

    public function addAdBlueRefill(AdBlueRefill $adBlueRefill): self
    {
        if (!$this->adBlueRefills->contains($adBlueRefill)) {
            $this->adBlueRefills[] = $adBlueRefill;
            $adBlueRefill->setEvent($this);
        }

        return $this;
    }

    public function removeAdBlueRefill(AdBlueRefill $adBlueRefill): self
    {
        if ($this->adBlueRefills->contains($adBlueRefill)) {
            $this->adBlueRefills->removeElement($adBlueRefill);
            // set the owning side to null (unless already changed)
            if ($adBlueRefill->getEvent() === $this) {
                $adBlueRefill->setEvent(null);
            }
        }

        return $this;
    }
}
