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
    private $billing;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    private $billingDate;
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBilling(): ?Truck
    {
        return $this->billing;
    }

    public function setBilling(?Truck $billing): self
    {
        $this->billing = $billing;

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
}
