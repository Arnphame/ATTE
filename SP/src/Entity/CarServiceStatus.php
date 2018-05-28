<?php
/**
 * Created by PhpStorm.
 * User: arnas
 * Date: 18.5.28
 * Time: 18.25
 */

namespace App\Entity;


class CarServiceStatus
{
    private $status;

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
}