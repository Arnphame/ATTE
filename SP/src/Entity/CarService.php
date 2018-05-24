<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="`carservice`")
 * @ORM\Entity
 */
class CarService
{
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="CarService")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $rulerUser;

    /**
     * @param mixed $ruler
     */
    public function setRulerUser($ruler)
    {
        $this->rulerUser = $ruler;
    }
    public function getRulerUser()
    {
        return $this->rulerUser;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Car", inversedBy="CarService")
     * @ORM\JoinColumn(name="car_id", referencedColumnName="id")
     */
    private $rulerCar;

    /**
     * @param mixed $ruler
     */
    public function setRulerCar($ruler)
    {
        $this->rulerCar = $ruler;
    }
    public function getRulerCar()
    {
        return $this->rulerCar;
    }
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="datetime", length=191)
     * @Assert\NotBlank()
     */
    private $time;
    /**
     * @ORM\Column(type="string", length=191)
     */
    private $status;
    /**
     * @ORM\Column(type="string", length=191, unique=true, nullable=true))
     */
    private $mechanic;

    public function getTime()
    {
        return $this->time;
    }
    public function setTime($time)
    {
        $this->time = $time;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function getMechanic()
    {
        return $this->mechanic;
    }
    public function setMechanic($mechanic)
    {
        $this->mechanic = $mechanic;
    }
}
