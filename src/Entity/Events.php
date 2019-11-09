<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventsRepository")
 * @ORM\Table(
 *    indexes={@Index(name="search_idx", columns={"event_date"})}))
 * )
 */
class Events
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Truck", cascade={"persist", "remove"})
     */
    private $truck;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Trailer", cascade={"persist", "remove"})
     */
    private $trailer;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $direction;
    /**
     * @ORM\Column(type="datetimetz", nullable=false, unique=true)
     */
    private $eventDate;

    /**
     * @ORM\Column(type="string", nullable=false, length=2)
     * @Assert\Country()
     */
    private $country;

    /**
     *@ORM\Column(type="string", nullable=false)
     */
    private $Adress;
    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $goods;

    /**
     * @ORM\Column(type="smallint")
     */
    private $weight;
    /**
     * @ORM\Column(type="smallint")
     */
    private $temp;

    /**
     * @ORM\Column(type="boolean")
     */
    private $rezim;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $prim;

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

    public function getDirection(): ?string
    {
        return $this->direction;
    }

    public function setDirection(string $direction): self
    {
        $this->direction = $direction;

        return $this;
    }

    public function getEventDate(): ?\DateTimeInterface
    {
        return $this->eventDate;
    }

    public function setEventDate(\DateTimeInterface $eventDate): self
    {
        $this->eventDate = $eventDate;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->Adress;
    }

    public function setAdress(string $Adress): self
    {
        $this->Adress = $Adress;

        return $this;
    }

    public function getGoods(): ?string
    {
        return $this->goods;
    }

    public function setGoods(string $goods): self
    {
        $this->goods = $goods;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getTemp(): ?int
    {
        return $this->temp;
    }

    public function setTemp(int $temp): self
    {
        $this->temp = $temp;

        return $this;
    }

    public function getRezim(): ?bool
    {
        return $this->rezim;
    }

    public function setRezim(bool $rezim): self
    {
        $this->rezim = $rezim;

        return $this;
    }

    public function getPrim(): ?string
    {
        return $this->prim;
    }

    public function setPrim(?string $prim): self
    {
        $this->prim = $prim;

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
