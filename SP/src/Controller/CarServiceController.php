<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\CarService;
use App\Form\CarServiceStatusType;
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
        $id = $setCar->getId();
        $tokenStorage = $this->getUser();
        $cars = $this->getDoctrine()->getRepository(Car::class)->findBy(['ruler' => $user]);
        $form = $this->createForm(CarServiceType::class, $carService, array(
            'tokenStorage' => $tokenStorage,
            ));
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
                $user = $this->getUser();
                $carService->setRulerUser($user);
            }
            $carService->setStatus("Laukiama patvirtinimo");
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($carService);
            $entityManager->flush();


            return $this->redirectToRoute('carservice');

        }


        return $this->render(
            'car_service/register.html.twig',
            array('form' => $form->createView(),
                'cars' => $cars,)
        );
    }

    /**
     * @Route("/carservice", name="carservice")
     */
    public function ShowCarServices()
    {

        if ($this->getUser()->getisDisabled() == 1) {
            return $this->render(
                'main/index.html.twig',
                array('error' => 'Your account is disabled. Please contact administrator for more information',
                ));
        }

        if($this->getUser()->getRole() == 1) {
            $user = $this->getUser();

            $carService = $this->getDoctrine()->getRepository(CarService::class)->findBy(['rulerUser' => $user]);

            return $this->render('car_service/index.html.twig', [
                'controller_name' => 'CarServiceController',
                'carServices' => $carService,

            ]);
        } if ($this->getUser()->getRole() == 2) {
            $carService = $this->getDoctrine()->getRepository(CarService::class)->findAll();

            return $this->render('car_service/index.html.twig', [
                'controller_name' => 'CarServiceController',
                'carServices' => $carService,
            ]);
        }
        return $this->redirectToRoute('main');
    }
    /**
     * @Route("/carservicestatus/{id}", name="carservicestatus")
     */
    public function EditService($id, Request $request, \Swift_Mailer $mailer)
    {
        if($this->getUser()->getRole() == 2) {
            $service = $this->getDoctrine()->getRepository(CarService::class)->findOneBy(['id' => $id]);
            $em = $this->getDoctrine()->getManager();

            if (!$service) {
                return $this->render(
                    'profile/index.html.twig',
                    array('error' => 'No service with this ID found',
                    ));
            }

            $form = $this->createForm(CarServiceStatusType::class, $service);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $service->setMechanic($this->getUser());
                $em->flush();
                if($service->getStatus() == "Service done"){
                    $message = (new \Swift_Message('ATTE: Your vehicle is done!'))
                        ->setFrom('test@ATTE.com')
                        ->setTo($service->getRulerUser()->getEmail())
                        ->setBody('Job for ur vehicle is done!');

                    $mailer->send($message);
                }
                return $this->redirectToRoute('carservice');
            }
        }

        return $this->render(
            'car_service/statusedit.html.twig',
            array('form' => $form->createView(),
                'error' => 'No Car service with this ID found',
            ));
    }
}