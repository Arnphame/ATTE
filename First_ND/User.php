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

    public function __construct($name, $password)
    {
        $this->name = $name;
        $this->password = $password;
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