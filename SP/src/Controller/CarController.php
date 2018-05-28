<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\CarType;
use App\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class CarController extends Controller
{
    /**
 * @Route("/addcar", name="add_car")
 */
    public function addCarAction(Request $request)
    {
        $car = new Car();
        $form = $this->createForm(CarType::class, $car);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {

                $user = $this->getUser();
                $car->setRuler($user);
            }




         //
           // $user->setToken($token);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($car);
            $entityManager->flush();


           // $mailer->send($message);

            return $this->redirectToRoute('my_cars');

        }


        return $this->render(
            'car/addCar.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/caredit/{id}", name="caredit")
     */
    public function EditCar($id, Request $request)
    {

        $car = $this->getDoctrine()->getRepository(Car::class)->findOneBy(['id' => $id]);
        $em = $this->getDoctrine()->getManager();

        if (!$car) {
            return $this->render(
                'profile/index.html.twig',
                array('error' => 'No car found',
                ));
        }

        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();

            return $this->redirectToRoute('my_cars');
        }


        return $this->render(
            'car/addCar.html.twig',
            array('form' => $form->createView(),
                'error' => 'No service with this ID found',
                'car' => $car,
            ));
    }

    /**
     * @Route("/cars", name="my_cars")
     */
    public function myCarsAction(Request $request,  AuthenticationUtils $authenticationUtils, AuthorizationCheckerInterface $authorizationChecker)
    {
        if($this->getUser()->getisDisabled() == 1){
            return $this->render(
                'main/index.html.twig',
                array('error' => 'Your account is disabled. Please contact administrator for more information',
                ));
        }
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            if ($this->getUser()->getisActive() == 0) {
                return $this->render(
                    'email_authenticate/index.html.twig',
                    array('error' => 'You must authenticate before entering this',
                    ));
            }
        }
        if(!$authorizationChecker->isGranted('ROLE_USER'))
        {
            return $this->redirectToRoute('login');
        }

        $user = $this->getUser();
        $cars = $this->getDoctrine()->getRepository(Car::class)->findBy(['ruler' => $user]);

       // $mycars


        return $this->render('car/myCars.html.twig', [
            'controller_name' => 'CarController',
            'cars' => $cars
        ]);
    }
    /**
     * @Route("/cardelete/{id}", name="cardelete")
     */
    public function DeleteCar($id, Request $request)
    {

            $car = $this->getDoctrine()->getRepository(Car::class)->findOneBy(['id' => $id]);
            if ($car) {
                $em = $this->getDoctrine()->getManager();
                $em->remove($car);
                $em->flush();
            }

        return $this->redirectToRoute('my_cars');
    }
}
