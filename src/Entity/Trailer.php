<?php

namespace App\Entity;

use App\Validator as CSDD;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrailerRepository")
 */
class Trailer
{
    const  TRAILER_FRIGO = 'frigo';
    const TRAILER_DRYVAN = 'dry';
    const TRAILER_CONTAINER = 'container';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */

    private $id;
    /**
     * @ORM\Column(type="json", nullable=false)
     */

    private $type;

    /**
     * @ORM\Column(type="string", nullable=false, unique=true)
     * @CSDD\TrailerLicensePlate()
     *
     */
    private $licensenumber;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FrigoRefill", mappedBy="event")
     */
    private $frigoRefills;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $consumptionrate;

    public function __construct()
    {
        $this->frigoRefills = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?array
    {
        return $this->type;
    }

    public function setType(array $type): self
    {
        if (!in_array(
            $type,
            [
                self::TRAILER_CONTAINER,
                self::TRAILER_DRYVAN,
                self::TRAILER_FRIGO,
            ]
        )) {
            throw new InvalidArgumentException(
                "Invalid trailer type. Valid is: frigo, container, dryvan"
            );
        }
        $this->type = $type;

        return $this;
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

    public function getConsumptionrate(): ?int
    {
        return $this->consumptionrate;
    }

    public function setConsumptionrate(?int $consumptionrate): self
    {
        $this->consumptionrate = $consumptionrate;

        return $this;
    }
}
