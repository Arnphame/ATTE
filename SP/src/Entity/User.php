<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="`user`")
 * @ORM\Entity
 * @UniqueEntity(fields="email", message="Email already taken")
 * @UniqueEntity(fields="username", message="Username already taken")
 */
class User implements UserInterface
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
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
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=191, unique=true)
     * @Assert\NotBlank()
     */
    private $username;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * User = 0; Admin = 1;
     * @ORM\Column(type="integer", nullable=false)
     */
    private $role;

    /**
     * Active = 1; inactive = 0;
     * @ORM\Column(type="integer", nullable=false)
     */
    private $isActive;

    /**
     * For email confirmation
     * @ORM\Column(type="string", length=191)
     */
    private $token;


    /**
     * For forgot password
     * @ORM\Column(type="string", length=191)
     */
    private $tokenPass;
    /**
     * @ORM\Column(type="string", length=191)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=191)
     */
    private $phoneNumber;


    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getRole()
    {
        return $this->role;
    }
    public function setRole($role)
    {
        $this->role = $role;
    }
    public function setToken($token)
    {
        $this->token = $token;
    }
    public function getToken()
    {
        return $this->token;
    }
    public function setTokenPass($tokenPass)
    {
        $this->tokenPass= $tokenPass;
    }
    public function getTokenPass()
    {
        return $this->tokenPass;
    }
    public function setAddress($address)
    {
        $this->address = $address;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function setPhoneNumber($number)
    {
        $this->phoneNumber = $number;
    }
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
    public function setisActive($active)
    {
        $this->isActive = $active;
    }
    public function getisActive()
    {
        return $this->isActive;
    }

    public function getSalt()
    {
        return null;
    }
    public function getRoles()
    {
        return array('ROLE_USER');
    }
    public function eraseCredentials()
    {
        return null;
    }

}