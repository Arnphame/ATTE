<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="car")
 * @ORM\Entity
 */
class Car
{

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="car")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $ruler;

    /**
     * @param mixed $ruler
     */
    public function setRuler($ruler)
    {
        $this->ruler = $ruler;
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", length=9)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @ORM\Column(type="string", length=191, unique=true)
     * @Assert\NotBlank()
     */
    private $make;

    /**
     * @ORM\Column(type="string", length=191, unique=true)
     * @Assert\NotBlank()
     */
    private $model;

    /**
     * @ORM\Column(type="date", length = 17, unique=true)
     * @Assert\NotBlank()
     */
    private $year;

    /**
     * @ORM\Column(type="string", length=191)
     * @Assert\NotBlank()
     */
    private $fuelType;

    public function __construct()
    {
    }


    public function getMake()
    {
        return $this->make;
    }

    public function setMake($make)
    {
        $this->make = $make;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }
    public function setFuelType($fuel)
    {
        $this->fuelType = $fuel;
    }
    public function getFuelType()
    {
        return $this->fuelType;
    }

}