<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EmailAuthenticateController extends Controller
{
    /**
     * @Route("/emailauthenticate", name="email_authenticate")
     */
    public function index()
    {
        return $this->render('email_authenticate/index.html.twig', [
            'controller_name' => 'EmailAuthenticateController',
        ]);
    }
}
