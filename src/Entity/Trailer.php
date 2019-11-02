<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Validator as CSDD;
use InvalidArgumentException;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrailerRepository")
 */
class Trailer
{
    const  TRAILER_FRIGO='frigo';
    const TRAILER_DRYVAN='dry';
    const TRAILER_CONTAINER='container';

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
            throw new InvalidArgumentException
            ("Invalid trailer type. Valid is: frigo, container, dryvan");
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


}
