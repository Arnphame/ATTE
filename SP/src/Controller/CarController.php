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

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($car);
            $entityManager->flush();

            return $this->redirectToRoute('my_cars');

        }


        return $this->render(
            'car/addCar.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/cars", name="my_cars")
     */
    public function myCarsAction(Request $request,  AuthenticationUtils $authenticationUtils, AuthorizationCheckerInterface $authorizationChecker)
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            if ($this->getUser()->getisActive() == 0) {
                return $this->render(
                    'email_authenticate/index.html.twig',
                    array('error' => 'You must authenticate before entering this',
                    ));
            }
        if($this->getUser()->getisActive() == 0){
            return $this->render(
                'email_authenticate/index.html.twig',
                array('error' => 'You must authenticate before entering this',
                ));
        }
        if(!$authorizationChecker->isGranted('ROLE_USER'))
        {
            return $this->redirectToRoute('login');
        }

        return $this->render(
            'car/myCars.html.twig', [
            'controller_name' => 'CarController',
        ]);
    }
}
