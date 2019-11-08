<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TripEventsRepository")
 */
class TripEvents
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Truck", inversedBy="tripEvents")
     */
    private $truck;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Trailer", inversedBy="tripEvents")
     */
    private $trailer;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $direction;
    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string")
     */
    private $Country;
    /**
     * @ORM\Column(type="string")
     */
    private $City;
    /**
     * @ORM\Column(type="string")
     */
    private $zipCode;
    /**
     * @ORM\Column(type="string")
     */
    private $good;
    /**
     * @ORM\Column(type="string")
     */
    private $weight;
    /*
     * РЕжим и темп
     *
     */

    /*
     * пробег
     */

    /*
     * остатки топлива, моточасы
     *
     */


    /*
     *
     *
     * Примечания
     */

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTruck(): ?Truck
    {
        return $this->truck;
    }

    public function setTruck(?Truck $truck): self
    {
        $this->truck = $truck;

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

    public function getDirection(): ?string
    {
        return $this->direction;
    }

    public function setDirection(string $direction): self
    {
        $this->direction = $direction;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(string $Country): self
    {
        $this->Country = $Country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(string $City): self
    {
        $this->City = $City;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getGood(): ?string
    {
        return $this->good;
    }

    public function setGood(string $good): self
    {
        $this->good = $good;

        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(string $weight): self
    {
        $this->weight = $weight;

        return $this;
    }
}
