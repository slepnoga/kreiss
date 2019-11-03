<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TelefonRepository")
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
     *  @ORM\Column(type="text", nullable=false)
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
