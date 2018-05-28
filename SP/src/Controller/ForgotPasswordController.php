<?php

namespace App\Controller;

use App\Entity\ChangePassword;
use App\Entity\ForgotPassword;
use App\Entity\User;
use App\Form\ChangePasswordType;
use App\Form\ForgotPasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class ForgotPasswordController extends Controller
{
    /**
     * @Route("/forgotpassword", name="forgot_password")
     */
    public function PasswordSend(Request $request, \Swift_Mailer $mailer)
    {
        if($this->getUser()->getisDisabled() == 1){
            return $this->render(
                'main/index.html.twig',
                array('error' => 'Your account is disabled. Please contact administrator for more information',
                ));
        }
        $user = new ForgotPassword();
        $error = "";
        $form = $this->createForm(ForgotPasswordType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['email' => $user->getEmail()]);
            if($user) {
                $tokenPass = bin2hex(openssl_random_pseudo_bytes(16));
                $user->setTokenPass($tokenPass);
                $this->getDoctrine()->getManager()->flush();

                $message = (new \Swift_Message('FORGOT PASSWORD'))
                    ->setFrom('test@ATTE.com')
                    ->setTo($user->getEmail())
                    ->setBody('127.0.0.1:8000/forgotpassword/' . $tokenPass);

                $mailer->send($message);
                return $this->render('main/index.html.twig', array(
                    'success'=>'Password reset done. Follow instructions in email'));
            }
            else{
                $error = "Email not found";
            }

        }
        return $this->render('forgot_password/index.html.twig', [
            'form' => $form->createView(),
            'error' => $error
        ]);
    }
    /**
     * @Route("/forgotpassword/{tokenPass}", name="forgotpass")
     */
    public function ForgotPassword(\Swift_Mailer $mailer, $tokenPass, Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['tokenPass' => $tokenPass]);
        var_dump($user);
        if ($user instanceof UserInterface)
            var_dump('instance');


        if($user == null)
        {
            return $this->redirectToRoute('main');
        }
        $changePass = new ChangePassword();
        $form = $this->createForm(ChangePasswordType::class, $changePass);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
                $password = $passwordEncoder->encodePassword($user, $changePass->getPassword()); // nesuveikia šita eilutė.
                $user->setPassword($password);
                $user->setTokenPass(0);
                $entityManager->flush();

            return $this->redirectToRoute('login');
        }

        return $this->render('change_password/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
