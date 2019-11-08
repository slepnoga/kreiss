<?php

namespace App\Entity;

use App\Validator as CSDD;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;
use Doctrine\ORM\Mapping\Table;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrailerRepository")
 * @Table(name="trailer",
 *     indexes={@Index(name="search_idx", columns={"type", "licensenumber"})})
 *  @ORM\Cache(usage="NONSTRICT_READ_WRITE")
 */
class Trailer
{
    const  TRAILER_FRIGO = 1;
    const TRAILER_DRYVAN = 2;
    const TRAILER_CONTAINER = 4;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */

    private $id;
    /**
     * @ORM\Column(type="smallint", nullable=false)
     */

    private $type;

    /**
     * @ORM\Column(type="string", nullable=false, unique=true)
     * @CSDD\TrailerLicensePlate()
     *
     */
    private $licensenumber;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FrigoRefill", mappedBy="event"
     *     ,cascade={"persist", "merge", "remove"}, fetch="EXTRA_LAZY")
     * @ORM\Cache(usage="NONSTRICT_READ_WRITE")
     */
    private $frigoRefills;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $consumptionrate;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TripEvents", mappedBy="trailer")
     */
    private $tripEvents;


    public function __construct()
    {
        $this->frigoRefills = new ArrayCollection();
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

    /**
     * @return Collection|FrigoRefill[]
     */
    public function getFrigoRefills(): Collection
    {
        return $this->frigoRefills;
    }

    public function addFrigoRefill(FrigoRefill $frigoRefill): self
    {
        if (!$this->frigoRefills->contains($frigoRefill)) {
            $this->frigoRefills[] = $frigoRefill;
            $frigoRefill->setEvent($this);
        }

        return $this;
    }

    public function removeFrigoRefill(FrigoRefill $frigoRefill): self
    {
        if ($this->frigoRefills->contains($frigoRefill)) {
            $this->frigoRefills->removeElement($frigoRefill);
            // set the owning side to null (unless already changed)
            if ($frigoRefill->getEvent() === $this) {
                $frigoRefill->setEvent(null);
            }
        }

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getConsumptionrate(): ?float
    {
        return $this->consumptionrate;
    }

    public function setConsumptionrate(?float $consumptionrate): self
    {
        $this->consumptionrate = $consumptionrate;

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
            $tripEvent->setTrailer($this);
        }

        return $this;
    }

    public function removeTripEvent(TripEvents $tripEvent): self
    {
        if ($this->tripEvents->contains($tripEvent)) {
            $this->tripEvents->removeElement($tripEvent);
            // set the owning side to null (unless already changed)
            if ($tripEvent->getTrailer() === $this) {
                $tripEvent->setTrailer(null);
            }
        }

        return $this;
    }
}
