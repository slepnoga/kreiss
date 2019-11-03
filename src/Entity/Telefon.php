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
     * @ORM\OneToOne(targetEntity="App\Entity\Truck", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="telBill", referencedColumnName="telBilling")
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

    public function getTruck(): ?Truck
    {
        return $this->truck;
    }

    public function setTruck(?Truck $truck): self
    {
        $this->truck = $truck;

        return $this;
    }


}
