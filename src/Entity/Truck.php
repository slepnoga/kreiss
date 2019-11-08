<?php

namespace App\Entity;

use App\Validator as CSDD;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;
use Doctrine\ORM\Mapping\Table;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TruckRepository")
 * @Table(name="truck",
 *     indexes={@Index(name="search_idx", columns={"licensenumber"})})
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
     * @ORM\OneToMany(targetEntity="App\Entity\FuelRefill",
     *     mappedBy="event",
     *     cascade={"persist", "merge", "remove"}, fetch="EXTRA_LAZY")
     */
    private $fuelRefills;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AdBlueRefill",
     *     mappedBy="event",
     *     cascade={"persist", "merge", "remove"}, fetch="EXTRA_LAZY")
     */
    private $adBlueRefills;




    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TelefonBilling",
     *     mappedBy="truck",cascade={"persist", "merge", "remove"},
     *     fetch="EXTRA_LAZY")
     */
    private $telefonBillings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Mileage",
     *     mappedBy="event",
     *     cascade={"persist", "merge", "remove"},
     *     fetch="EXTRA_LAZY" )
     * @ORM\Cache(usage="NONSTRICT_READ_WRITE")
     */
    private $mileages;

    /**
     * @ORM\Column(type="datetime", options={"default"="1800-01-01"})
     */
    private $data;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TripEvents", mappedBy="truck")
     */
    private $tripEvents;




    public function __construct()
    {
        $this->fuelRefills = new ArrayCollection();
        $this->adBlueRefills = new ArrayCollection();
        $this->telefonBillings = new ArrayCollection();
        $this->mileages = new ArrayCollection();
        $this->tripEvents = new ArrayCollection();
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

        /**
     * @return Collection|TelefonBilling[]
     */
    public function getTelefonBillings(): Collection
    {
        return $this->telefonBillings;
    }

    public function addTelefonBilling(TelefonBilling $telefonBilling): self
    {
        if (!$this->telefonBillings->contains($telefonBilling)) {
            $this->telefonBillings[] = $telefonBilling;
            $telefonBilling->setTruck($this);
        }

        return $this;
    }

    public function removeTelefonBilling(TelefonBilling $telefonBilling): self
    {
        if ($this->telefonBillings->contains($telefonBilling)) {
            $this->telefonBillings->removeElement($telefonBilling);
            // set the owning side to null (unless already changed)
            if ($telefonBilling->getTruck() === $this) {
                $telefonBilling->setTruck(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Mileage[]
     */
    public function getMileages(): Collection
    {
        return $this->mileages;
    }

    public function addMileage(Mileage $mileage): self
    {
        if (!$this->mileages->contains($mileage)) {
            $this->mileages[] = $mileage;
            $mileage->setEvent($this);
        }

        return $this;
    }

    public function removeMileage(Mileage $mileage): self
    {
        if ($this->mileages->contains($mileage)) {
            $this->mileages->removeElement($mileage);
            // set the owning side to null (unless already changed)
            if ($mileage->getEvent() === $this) {
                $mileage->setEvent(null);
            }
        }

        return $this;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return Collection|TripEvents[]
     */
    public function getTripEvents(): Collection
    {
        return $this->tripEvents;
    }

    public function addTripEvent(TripEvents $tripEvent): self
    {
        if (!$this->tripEvents->contains($tripEvent)) {
            $this->tripEvents[] = $tripEvent;
            $tripEvent->setTruck($this);
        }

        return $this;
    }

    public function removeTripEvent(TripEvents $tripEvent): self
    {
        if ($this->tripEvents->contains($tripEvent)) {
            $this->tripEvents->removeElement($tripEvent);
            // set the owning side to null (unless already changed)
            if ($tripEvent->getTruck() === $this) {
                $tripEvent->setTruck(null);
            }
        }

        return $this;
    }

   
}
