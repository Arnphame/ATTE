<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Table(name="`service`")
 * @ORM\Entity
 * @UniqueEntity(fields="name", message="This service is already created")
 */
class Service
{
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="Service")
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
    public function getRuler()
    {
        return $this->ruler;
    }
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=191, unique=true)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Column(type="float", length=6)
     * @Assert\NotBlank()
     * @Assert\Range(
     *     min = 0.1,
     *     minMessage = "Price should not be less than 0.1"
     * )
     */
    private $price;

    /**
     * @ORM\Column(type="float", length=3)
     * @Assert\NotBlank()
     * @Assert\Range(
     *     min = 0.1,
     *     minMessage = "Duration can not be less than 0.1 hour"
     * )
     */
    private $duration;

    /**
     * @ORM\Column(type="integer", length=3, nullable=true)
     * @Assert\Range(
     *     min = 1,
     *     max = 100,
     *     minMessage = "Discount should not be less than 1%",
     *     maxMessage = "Discount should not be more than 100%"
     * )
     */
    private $discount;

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getDuration()
    {
        return $this->duration;
    }
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }
    public function getDiscount()
    {
        return $this->discount;
    }
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }
}
