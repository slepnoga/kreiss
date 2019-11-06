<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TelefonRepository")
 * @Table(
 *     name="telefon",uniqueConstraints={
 *     @UniqueConstraint(name="tel_plus_truck",columns={"phonenumber", "truck"})}
 *     )
 *
 */
class Telefon
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $phonenumber;
    /**
     * @ORM\Column(type="float", nullable=false)
     */
    private $billing;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $truck;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhonenumber(): ?int
    {
        return $this->phonenumber;
    }

    public function setPhonenumber(int $phonenumber): self
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    public function getBilling(): ?float
    {
        return $this->billing;
    }

    public function setBilling(float $billing): self
    {
        $this->billing = $billing;

        return $this;
    }

    public function getTruck(): ?string
    {
        return $this->truck;
    }

    public function setTruck(string $truck): self
    {
        $this->truck = $truck;

        return $this;
    }
}
