<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 * @ORM\Table(name="events", indexes={@ORM\Index(name="IDX_events_n_reg_new", columns={"n_reg_new"})})
 */
class Event
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $fuelId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Fuel")
     * @ORM\JoinColumn(fieldName="fuelId")
     */
    private $fuel;

    /**
     * @ORM\Column(type="integer", name="oper_code")
     */
    private $operationId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Operation")
     * @ORM\JoinColumn(name="oper_code")
     */
    private $operation;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $person;

    /**
     * @ORM\Column(type="integer")
     */
    private $regAddrKoatuu;

    /**
     * @ORM\Column(type="datetime", name="d_reg")
     */
    private $dateReg;

    /**
     * @ORM\Column(type="integer", name="dep_code")
     */
    private $depCode;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $brand;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $model;

    /**
     * @ORM\Column(type="integer", name="make_year")
     */
    private $makeYear;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $color;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $kind;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $body;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $capacity;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true, name="own_weight")
     */
    private $ownWeight;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true, name="total_weight")
     */
    private $totalWeight;

    /**
     * @ORM\Column(type="string", length=25, name="n_reg_new")
     */
    private $reg;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $purposed;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFuelId(): ?int
    {
        return $this->fuelId;
    }

    public function setFuelId(int $fuelId): self
    {
        $this->fuelId = $fuelId;

        return $this;
    }

    public function getFuel(): ?Fuel
    {
        return $this->fuel;
    }

    public function setFuel(?Fuel $fuel): self
    {
        $this->fuel = $fuel;

        return $this;
    }

    public function getOperationId(): ?int
    {
        return $this->operationId;
    }

    public function setOperationId(int $operationId): self
    {
        $this->operationId = $operationId;

        return $this;
    }

    public function getOperation(): ?Operation
    {
        return $this->operation;
    }

    public function setOperation(?Operation $operation): self
    {
        $this->operation = $operation;

        return $this;
    }

    public function getPerson(): ?string
    {
        return $this->person;
    }

    public function setPerson(string $person): self
    {
        $this->person = $person;

        return $this;
    }

    public function getRegAddrKoatuu(): ?int
    {
        return $this->regAddrKoatuu;
    }

    public function setRegAddrKoatuu(int $regAddrKoatuu): self
    {
        $this->regAddrKoatuu = $regAddrKoatuu;

        return $this;
    }

    public function getDateReg(): ?\DateTimeInterface
    {
        return $this->dateReg;
    }

    public function setDateReg(\DateTimeInterface $dateReg): self
    {
        $this->dateReg = $dateReg;

        return $this;
    }

    public function getDepCode(): ?int
    {
        return $this->depCode;
    }

    public function setDepCode(int $depCode): self
    {
        $this->depCode = $depCode;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getMakeYear(): ?int
    {
        return $this->makeYear;
    }

    public function setMakeYear(int $makeYear): self
    {
        $this->makeYear = $makeYear;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getKind(): ?string
    {
        return $this->kind;
    }

    public function setKind(string $kind): self
    {
        $this->kind = $kind;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function getCapacity(): ?string
    {
        return $this->capacity;
    }

    public function setCapacity(string $capacity): self
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function getOwnWeight()
    {
        return $this->ownWeight;
    }

    public function setOwnWeight($ownWeight): self
    {
        $this->ownWeight = $ownWeight;

        return $this;
    }

    public function getTotalWeight()
    {
        return $this->totalWeight;
    }

    public function setTotalWeight($totalWeight): self
    {
        $this->totalWeight = $totalWeight;

        return $this;
    }

    public function getReg(): ?string
    {
        return $this->reg;
    }

    public function setReg(string $reg): self
    {
        $this->reg = $reg;

        return $this;
    }

    public function getPurposed(): ?string
    {
        return $this->purposed;
    }

    public function setPurposed(string $purposed): self
    {
        $this->purposed = $purposed;

        return $this;
    }
}
