<?php
/**
 * Created by PhpStorm.
 * User: arnas
 * Date: 18.3.13
 * Time: 09.57
 */

class User
{
    private $name;
    private $password;

    private $gender;
    private $dateOfBirth;
    private $transport;

    public function __construct($name, $password, $gender, $dateOfBirth, $transport)
    {
        $this->name = $name;
        $this->password = $password;
        $this->gender = $gender;
        $this->dateOfBirth = $dateOfBirth;
        $this->transport = $transport;
    }

    public function GetName()
    {
        return $this->name;
    }

    public function GetPassword()
    {
        return $this->password;
    }
}