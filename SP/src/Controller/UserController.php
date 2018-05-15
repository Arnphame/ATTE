<?php

namespace App\Controller;

use App\Form\UserType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends Controller
{
    /**
     * @Route("/register", name="user_registration")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder, \Swift_Mailer $mailer)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
            $user->setRole(1);
            $user->setisActive(0);


            $token = bin2hex(openssl_random_pseudo_bytes(16));
            
            $user->setToken($token);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $message = (new \Swift_Message('Hello email'))
                ->setFrom('test@ATTE.com')
                ->setTo($user->getEmail())
                ->setBody('127.0.0.1:8000/activate/' . $token);

            $mailer->send($message);

            return $this->redirectToRoute('email_authenticate');


        }

        return $this->render(
            'user/register.html.twig',
            array('form' => $form->createView())
        );
    }
    /**
     * @Route("/activate/{token}", name="Activation")
     */
    public function Activate($token)
    {
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['token' => $token]);
        if($user == null)
        {
            return $this->redirectToRoute('main');
        }
        $em = $this->getDoctrine()->getManager();
        $user->setIsActive(1);
        $user->setToken(0);
        $em->flush();
        return $this->redirectToRoute('login');
    }

    /**
     * @param \Swift_Mailer $mailer
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/resend", name="Resend")
     */
    public function Resend(\Swift_Mailer $mailer)
    {
        $user = $this->getUser();
        $token = $user->getToken();
        if($user->getisActive() == 1){
            return $this->render('main/index.html.twig', array(
                'error' => 'Your account is already activated',
            ));
        }
        $message = (new \Swift_Message('Resend authentication code'))
            ->setFrom('test@ATTE.com')
            ->setTo($user->getEmail())
            ->setBody('127.0.0.1:8000/activate/' . $token);

        $mailer->send($message);
        return $this->render('email_authenticate/index.html.twig', array(
            'success'=>'Activation e-mail resent!',
        ));
    }
}