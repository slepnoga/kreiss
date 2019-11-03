<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GeoDataRepository")
 */
class GeoData
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=2, nullable=false)
     */
    private $iso;

    /**
     * @ORM\Column(type="string", length=80, nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(name="printable_name", type="string", length=80, nullable=false)
     */
    private $printableName;


    /**
     * @ORM\Column( type="string", length=3)
     */
    private $iso3;


    /**
     * @ORM\Column(type="smallint")
     */
    private $numcode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIso(): ?string
    {
        return $this->iso;
    }

    public function setIso(string $iso): self
    {
        $this->iso = $iso;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrintableName(): ?string
    {
        return $this->printableName;
    }

    public function setPrintableName(string $printableName): self
    {
        $this->printableName = $printableName;

        return $this;
    }

    public function getIso3(): ?string
    {
        return $this->iso3;
    }

    public function setIso3(string $iso3): self
    {
        $this->iso3 = $iso3;

        return $this;
    }

    public function getNumcode(): ?int
    {
        return $this->numcode;
    }

    public function setNumcode(int $numcode): self
    {
        $this->numcode = $numcode;

        return $this;
    }
}
