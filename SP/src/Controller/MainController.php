<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    /**
     * @Route("/", name="main")
     */
    public function index()
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            if ($this->getUser()->getisDisabled() == 1) {
                return $this->render(
                    'main/index.html.twig',
                    array('error' => 'Your account is disabled. Please contact administrator for more information',
                    ));
            }
        }
            return $this->render('main/index.html.twig', [
                'controller_name' => 'MainController',
            ]);
        }

}
