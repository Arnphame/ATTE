<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request, AuthenticationUtils $authenticationUtils, AuthorizationCheckerInterface $authorizationChecker)
    {
        if($authorizationChecker->isGranted('ROLE_USER'))
        {
            return $this->redirectToRoute('profile');
        }
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();



        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login/index.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error,
        ));
    }
}