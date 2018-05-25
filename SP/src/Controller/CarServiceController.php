<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\CarService;
use App\Form\CarServiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CarServiceController extends Controller
{
    /**
     * @Route("/carservicecreate", name="car_service")
     */
    public function createService(Request $request)
    {
        if($this->getUser()->getisDisabled() == 1){
            return $this->render(
                'main/index.html.twig',
                array('error' => 'Your account is disabled. Please contact administrator for more information',
                ));
        }
        $carService = new CarService();
        $user = $this->getUser();
        $setCar = new Car();
        $cars = $this->getDoctrine()->getRepository(Car::class)->findBy(['ruler' => $user]);
        $form = $this->createForm(CarServiceType::class, $carService);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {

                $user = $this->getUser();
                $carService->setRulerUser($user);
            }
            //$car = $this->getDoctrine()->getRepository(Car::class)->find($setCar->getId());
            $carService->setStatus("Laukiama patvirtinimo");
            //$carService->setRulerCar($car);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($carService);
            $entityManager->flush();


            return $this->redirectToRoute('main');

        }


        return $this->render(
            'car_service/register.html.twig',
            array('form' => $form->createView(),
                'cars' => $cars,)
        );
    }
}