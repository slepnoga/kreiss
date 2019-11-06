<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TelefonBillingRepository")
 */
class TelefonBilling
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Truck", inversedBy="telefonBillings",cascade={"persist"}, fetch="EXTRA_LAZY")
     */
    private $truck;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    private $billingDate;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $phoneNumber;


    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $billance;

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

    public function getPhoneNumber(): ?int
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(int $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getBillingDate(): ?\DateTimeInterface
    {
        return $this->billingDate;
    }

    public function setBillingDate(\DateTimeInterface $billingDate): self
    {
        $this->billingDate = $billingDate;

        return $this;
    }

    public function getBillance(): ?int
    {
        return $this->billance;
    }

    public function setBillance(int $billance): self
    {
        $this->billance = $billance;

        return $this;
    }
}
