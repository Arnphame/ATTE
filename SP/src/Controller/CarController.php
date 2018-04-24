<?php

namespace App\Controller;

use App\Form\CarType;
use App\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends Controller
{
    /**
     * @Route("/car", name="add_car")
     */
    public function registerAction(Request $request)
    {
        $car = new Car();
        $form = $this->createForm(CarType::class, $car);

        $form->handleRequest($request);

        return $this->render(
            'car/myCars.html.twig',
            array('form' => $form->createView())
        );
    }
}