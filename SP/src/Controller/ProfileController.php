<?php

namespace App\Controller;

use App\Entity\Service;
use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfileController extends Controller
{
    /**
     * @Route("/profile", name="profile")
     */
    public function index()
    {
        if($this->getUser()->getisActive() == 0){
            return $this->render(
                'email_authenticate/index.html.twig',
                array('error' => 'You must authenticate before entering this',
                ));
        }

            return $this->render('profile/index.html.twig', [
                'controller_name' => 'ProfileController',
            ]);
    }
}
